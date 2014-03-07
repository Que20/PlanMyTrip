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

html.Form = function(div, items){
	this.renderTo = div;
	this.items = items;
	
}

html.Form.prototype.init = function(){
	var me = this;
	$('#info_form').remove();
	me.container = $('<form id="info_form"/>');
	$(this.items).each(function(index, item){
		
		me.renderTo.append(me.container);
		me.container.append(item.label+' : <input type="'+item.type+'" placeholder="'+item.placeholder+'" name="'+item.name+'" class="'+item.cls+'" '+item.required+' /><br>');
		$(item).addClass('form_element');
	});
}




var accountMenuBar = new html.Menu($("#accountManagment"), [
							{
								label : "Mes guides"
							}, 
							{
								label : "Mes infos",
								click : function(e){ 
									var accountInfoForm = new html.Form($('#user_content'),[
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
									}
									]);
									accountInfoForm.init();
								}
							},
							{
								label : "Paramètres"
							}
					]);

accountMenuBar.init();







