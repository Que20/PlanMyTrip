this.html = this.html || {};

html.Menu = function(div, values) {
	this.renderTo = div;
	this.items = values;
	console.log(div);
	console.log(values);
}

html.Menu.prototype.init = function() {
	var me = this;
	me.container = $('<div id="accountMenuBar"/>')
	me.renderTo.append(me.container);
	var 	i = 0;
	$(this.items).each(function(index, item){
		var divCat = $('<div class="accountMenuCat">');
		divCat.text(item.label);
		divCat.css('cursor','pointer');
		me.container.append(divCat);
		$(divCat).attr('id','onglet'+i+'');

		$(divCat).on("click", function(e){
			$(".selectedCat").removeClass("selectedCat");
			$(e.target).addClass("selectedCat");
			if(item.click){
				item.click(e);
			}
		});
		i ++;
	});
}

html.Form = function(global, sub, items, bool){
	this.global = global,
	this.sub = sub;
	this.items = items;
	
}

html.Form.prototype.init = function(){
	
		var me = this;
		var savevalue = "";
		me.global.append(me.sub);
		me.form = $('<div id="info_form"/>');
		me.table = $('<table />');
		
		me.sub.append(me.form);
		me.form.append(me.table);
		$(this.items).each(function(index, item){
			if(item.value){
				savevalue = item.value;
			}
				
			me.table.append('<tr><td style="width:180px;">'+item.label+' </td><td><input id="'+item.id+'" onclick="'+item.click+'" type="'+item.type+'" placeholder="'+item.placeholder+'" name="'+item.name+'" class="'+item.cls+'" '+item.required+ 'value="'+savevalue+'" /></td></tr>');
			$(item).addClass('form_element');
		});
}




var accountMenuBar = new html.Menu($("#accountManagment"), [
							{
								label : "Mes guides",
								click : function(e){
									var iframe = $('<iframe />');
									iframe.attr('src','guide.php');
									$('#sub_content').html('');
									iframe.css('border','none');
									iframe.css('width','600');
									iframe.css('height','600');
									$('#sub_content').append(iframe);
								}
							}, 
							{
								label : "Mes infos",
								click : function(e){ 
									$('#sub_content').html('');
									var accountInfoForm = new html.Form($('#user_content'), $('#sub_content'), [
									{
										label : "Nom Complet",
										type : "text",
										placeholder : "",
										id : "fullname",
										name : "fullname",
										required :"",
										cls : "form_element"
									},
									{
										label : "Ancien mot de passe",
										type : "password",
										placeholder : "",
										name : "oldmdp",
										required : "",
										cls : "form_element",
										id : "oldmdp"
									},
									{
										label : "Nouveau mot de passe",
										type : "password",
										placeholder : "",
										id : "newmdp",
										name : "newmdp",
										required : "",
										cls : "form_element"
									},
									{
										label : "Confirmation",
										type : "password",
										placeholder : "",
										name : "newconfmdp",
										id : "newconfmdp",
										required : "",
										cls : "form_element"
									},
									{
										label : "",
										type : "submit",
										placeholder : "",
										name : "infoSubmit",
										required : "",
										cls : "inputInfoSubmit",
										id : "inputInfoSubmit",
										click : "sendInfo()",
										value : "Valider"
									}
									]);
									accountInfoForm.init();
								}
							},
							{
								label : "Paramètres",
								click : function(e){ 
									$('#sub_content').html('');
									var accountParam = new html.Form($('#user_content'), $('#sub_content'), [
									{
										label : "Entrez votre mot de passe",
										type : "password",
										placeholder : "",
										name : "supprmdp",
										required : "required",
										cls : "form_element"
									},
									{
										label : "",
										type : "submit",
										placeholder : "",
										name : "suppr_account",
										required : "",
										cls : "form_element",
										click : "deleteAccount()",
										value : "Supprimer le compte"
									}
									]);
									accountParam.init();
								}
							}
					]);

accountMenuBar.init();


function sendInfo(){
	console.log("On es entré! aaah, c'est bon, vas-y salope, rentre en moi!");
	var old = $('#oldmdp').val();
	var newm = $('#newmdp').val();
	var conf = $('#newconfmdp').val();
	var name = $('#fullname').val();
	$.ajax({
		type	: "POST",
		url		: "sendInfo.php",
		//datatype: "json",
		data 	: 	{
						"fullname" : name,
						"old"	   : old,
						"new"	   : newm,
						"conf"	   : conf
					}
		}).done(function(r){
			console.log(r);
		}).fail(function(r){
			console.log("fail");
		});
}

function deleteAccount(){
	console.log("Suppression yolooooooooo");

	$.ajax({
		type	: "POST",
		url		: "deleteAccount.php",
		//datatype: "json",
		data 	: 	{
						"supprmdp" : "alex"
					}
		}).done(function(r){
			console.log(r);
		}).fail(function(r){
			console.log("fail");
		});
}
