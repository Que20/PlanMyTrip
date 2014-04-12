this.html = this.html || {};
var bool = 1;
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
	var i = 0;
	$(this.items).each(function(index, item){
		var divCat = $('<div class="accountMenuCat">');
		divCat.text(item.label);
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
	this.bool = bool;
	
}

html.Form.prototype.init = function(){
	if(bool == 1){
		var me = this;
		me.global.append(me.sub);
		me.form = $('<div id="info_form"/>');
		me.table = $('<table />');
		
		me.sub.append(me.form);
		me.form.append(me.table);
		$(this.items).each(function(index, item){
			me.table.append('<tr><td style="width:180px;">'+item.label+' </td><td><input id="'+item.id+'" type="'+item.type+'" placeholder="'+item.placeholder+'" name="'+item.name+'" class="'+item.cls+'" '+item.required+' /></td></tr>');
			$(item).addClass('form_element');
		});
	}
	bool = 0;
}




var accountMenuBar = new html.Menu($("#accountManagment"), [
							{
								label : "Mes guides"
							}, 
							{
								label : "Mes infos",
								click : function(e){ 
									var accountInfoForm = new html.Form($('#user_content'), $('#sub_content'), [
									{
										label : "Nom Complet",
										type : "text",
										placeholder : "",
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
										cls : "form_element"
									},
									{
										label : "Nouveau mot de passe",
										type : "password",
										placeholder : "",
										name : "newmdp",
										required : "",
										cls : "form_element"
									},
									{
										label : "Confirmation",
										type : "password",
										placeholder : "",
										name : "newconfmdp",
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
										id : "inputInfoSubmit"
									}
									], bool);
									accountInfoForm.init();
								}
							},
							{
								label : "Paramètres"
							}
					]);

accountMenuBar.init();


