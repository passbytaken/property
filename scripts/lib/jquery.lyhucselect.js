(function($) {
     $.fn.lyhucSelect = function(options) {
		var element     = this;
		var controlProvince,controlCity ,controlDistrict;
		var isselect=false;
		
		var defaults = {
			id:{p:'',c:'',d:''},
			defaultValue:{p:'',c:'',d:''},
			defaultText:{text:'--请选择--',value:''},
			valueIsName:false
		};
		
		var province = $("#" + options.id.p);
        var city = $("#" + options.id.c);
        var district = $("#" + options.id.d);
      
        var jsonProvince = "/scripts/json/json-array-of-province.js";
        var jsonCity = "/scripts/json/json-array-of-city.js";
        var jsonDistrict = "/scripts/json/json-array-of-district.js";
        var hasDistrict = true;
        var initProvince = "<option value=''>请选择省份</option>";
        var initCity = "<option value=''>请选择城市</option>";
        var initDistrict = "<option value=''>请选择区县</option>";
		
		(function init(){
			var _LoadOptions =function(datapath, pre, targetobj, parentobj, comparelen, initoption) {

                $.get(datapath,
                function(r) {
                    var t = ''; // t: html容器 
                    var s; // s: 选中标识 
                    
                    for (var i = 0; i < r.length; i++) {
                        s = '';
                        if (comparelen === 0) {
                            if (pre !== "" && pre != '' && r[i].code === pre) {
                                s = ' selected=\"selected\" ';
                                pre = '';
                            }
                            t += '<option value=' + r[i].code + s + '>' + r[i].name + '</option>';
                        } else {
                            var p = parentobj.val();
                            if (p.substring(0, comparelen) === r[i].code.substring(0, comparelen)) {
                                if (pre !== "" && pre != '' && r[i].code === pre) {
                                    s = ' selected=\"selected\" ';
                                    pre = '';
                                }
                                t += '<option value=' + r[i].code + s + '>' + r[i].name + '</option>';
                            }
                        }

                    }
                    if (initoption !== '') {
                        targetobj.html(initoption + t);
                    } else {
                        targetobj.html(t);
                    }
                },
                "json");
            }
			
			
			_LoadOptions(jsonProvince, options.defaultValue.p, province, null, 0, initProvince);
			province.change(function() {
				_LoadOptions(jsonCity, options.defaultValue.c, city, province, 2, initCity);
			});
			if (hasDistrict) {
				city.change(function() {
					_LoadOptions(jsonDistrict, options.defaultValue.d, district, city, 4, initDistrict);
				});
				province.change(function() {
					city.change();
				});
			}
			province.change();
			
		})();
		
	 }
})(jQuery);

