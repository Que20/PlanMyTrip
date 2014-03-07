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

sayHello = function(e) {
	console.log("hello");
}

var accountMenuBar = new html.Menu($("#accountManagment"), [
							{
								label : "Mes guides",
								click : function(e){
									sayHello(e);
								}
							}, 
							{
								label : "Mes infos"
							},
							{
								label : "Paramètres"
							}
					]);

accountMenuBar.init();

