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

html.Form = function(div, placeholder, name, type, required){
	this.renderTo = div;
	this.placeholder = placeholder;
	this.name = name;
	this.type = type;
	this.required = required;
	console.log(name);
}

html.Form.prototype.init = function(){
	var me = this;
	me.container = $('<form id="info_form"/>');
	me.renderTo.append(me.container);
	$(this.name).each(function(index, item){
		me.container.append('<input type="'+me.type+'" placeholder="'+me.placeholder+'" name="'+me.name+'" '+required);
		if(item.click){
				item.click(e);
			}
	});
}




var accountMenuBar = new html.Menu($("#accountManagment"), [
							{
								label : "Mes guides"
							}, 
							{
								label : "Mes infos",
								click : function(e){ 
									var accountInfoForm = new html.Form($('#user_content'), "", "fullname", "text", "");
									accountInfoForm.init();
								}
							},
							{
								label : "Paramètres"
							}
					]);

accountMenuBar.init();


//$('#onglet1').onclick
