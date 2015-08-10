	if(Prototype.Browser.WebKit){
	    String.prototype.ajax_filter = function(){
			var t = this;
	        var esc = escape(t);
			if(esc.indexOf("%u") < 0 && esc.indexOf("%") > -1) {
				return decodeURIComponent(esc);
			} else {
				return t;
			}
//	        return(esc.indexOf("%u") < 0 && esc.indexOf("%") > -1) ? decodeURIComponent(esc) : t;
		}
	} else {
		String.prototype.ajax_filter = function(){return this};		
	}

	function setDefault() {
		if(typeof _get == 'undefined') return;
		if($F('area') !== undefined) {
			['area1_1', 'area1_2', 'area2_1', 'area2_2', 'rosencorp', 'rosenname', 'station_from', 'station_to'].each( function(element) {
				$A($(element).childNodes).each( function(node) {
					$(element).removeChild(node);
				});
				var option = document.createElement('option');
				option.value = 0;
				option.innerHTML = '▼選択';
				option.selected = true;
				$(element).appendChild(option);
			});

			var myAjax = new Ajax.Request(
				"../js/return_pref.html",
				{
					method: 'get', 
					parameters: "area="+$F('area'),
					asynchronous: false
				}
			);
			myAjax.transport.responseText.ajax_filter().split("\n").each( function(node) {
				var pair = node.split(",");
				var option = document.createElement('option');
				option.value = pair[0];
				option.innerHTML = pair[1];
				option2 = option.cloneNode(true);
				$('area1_1').appendChild(option);
				$('area2_1').appendChild(option2);
				if(_get.city !== undefined) {
					if(_get.city[0] && option.value == _get.city[0][0]) option.selected = true;
					if(_get.city[1] && option.value == _get.city[1][0]) option2.selected = true;
				}
			});
			var myAjax2 = new Ajax.Request(
				"../js/return_corp.php",
				{
					method: 'get', 
					parameters: "area="+$F('area'),
					asynchronous: false
				}
			);
			var corpDefault;
			Try.these(
				function () { corpDefault = _get.range[0] },
				function () { corpDefault = _get.station[0] },
				function () { corpDefault = _get.line[0] }
			);
			myAjax2.transport.responseText.ajax_filter().split("\n").each( function(node) {
				var pair = node.split(",");
				var option = document.createElement('option');
				option.value = pair[0];
				option.innerHTML = pair[1];
				if(corpDefault == option.value) option.selected = true;
				$('rosencorp').appendChild(option);
			});
		}
		if(_get.city !== undefined && _get.city[0]) {
			$A($('area1_1').childNodes).each(function(node) {
				if(node.value == _get.city[0][0]) {
					changeCity(1, true, _get.city[0][1]);
				}
			});
		}
		if(_get.city !== undefined && _get.city[1]) {
			$A($('area2_1').childNodes).each(function(node) {
				if(node.value == _get.city[1][0]) {
					changeCity(2, true, _get.city[1][1]);
				}
			});
		}
		if(_get.wage !== undefined && _get.wage) {
			$A($('time01').childNodes).each(function(node) {
				if(node.value == _get.wage) {
					node.selected = true;
				}
			});
		}
		if(_get.feature !== undefined && _get.feature[0]) {
			$A($('select_features01').childNodes).each(function(node) {
				if(node.value == _get.feature[0]) {
					node.selected = true;
				}
			});
		}
		if(_get.feature !== undefined && _get.feature[1]) {
			$A($('select_features02').childNodes).each(function(node) {
				if(node.value == _get.feature[1]) {
					node.selected = true;
				}
			});
		}
		if(_get.haken !== undefined && _get.haken) {
			$('inc_haken_check').checked = true;
		}
		if(_get.job !== undefined) {
			var job_map = {
				'food':'01',
				'sales':'02',
				'enter':'03',
				'institution':'04',
				'transport':'05',
				'beauty':'06',
				'teacher':'07',
				'digital':'08',
				'office':'09',
				'mass':'10',
				'create':'11',
				'medical':'12'
			};
			_get.job.each(function(value) {
				$('work_type_'+job_map[value]).checked = true;
//				if($('work_type_'+job_map[value]).onclick !== undefined) {
//					$('work_type_'+job_map[value]).onclick();
//				}
			});
//			if(_get.subjob !== undefined) {
//				$H(_get.subjob).each(function(category) {
//					$H(category.value).each(function(category2) {
//						if(category2.value) {
//							document.getElementsByName('subjob['+category.key+']['+category2.key+']')[0].checked = true;
//						}
//					});
//				});
//			}
		}
		if(_get.time !== undefined && _get.time[0] && _get.time[1]) {
			$A($('time01').childNodes).each(function(node) {
				if(node.value == _get.time[0]) {
					node.selected = true;
				}
			});
			$A($('time02').childNodes).each(function(node) {
				if(node.value == _get.time[1]) {
					node.selected = true;
				}
			});
		}
		if(_get.station !== undefined && _get.station[0] && _get.station[1] && _get.station[2]) {
			changeCorp(true, _get.station[1]);
			changeLine(true, new Array(_get.station[2], _get.station[2]));
		}
		if ($('search_form')) {
		    Form.enable('search_form');
		}

		// range-function and line-function placed after enable-function for "station_to"-form disabled
		if(_get.range !== undefined && _get.range[0] && _get.range[1]) {
			changeCorp(true, _get.range[1]);
			if(_get.range[2] && _get.range[3]) {
				changeLine(true, new Array(_get.range[2], _get.range[3]));
			} else {
				changeLine(true);
			}
		}
		if(_get.line !== undefined && _get.line[0] && _get.line[1]) {
			changeCorp(true, _get.line[1]);
		}
	}

	function changeCity(no, sync, selected) {
		var pref = $F('area'+no+'_1');
		var url = '../js/return_city.html';
		var pars = 'pref='+pref;
		var myAjax = new Ajax.Request(
			url,
			{
				method: 'get', 
				parameters: pars,
				asynchronous: !sync,
				onComplete: function(req) { cityResponse(req, no, selected); }
			}
		);
		if(sync) {
			cityResponse(myAjax.transport, no, selected)
		}
	}
	function cityResponse(req, no, selected) {
		$A($('area'+no+'_2').childNodes).each(function(node) {
			$('area'+no+'_2').removeChild(node);
		});
		req.responseText.ajax_filter().split("\n").each( function(node) {
			var pair = node.split(",");
			var option = document.createElement('option');
			option.value = pair[0];
			option.innerHTML = pair[1];
			if(option.value == selected) option.selected = true;
			$('area'+no+'_2').appendChild(option);
		});
		if(selected === undefined) $('area'+no+'_2').firstChild.selected = true;
	}
	function changeCorp(sync, selected) {
		var corp = $F('rosencorp');
		if(corp == 0) {
			var rosen = $('rosenname');
			var station_to = $('station_to');
			var station_from = $('station_from');
			$A(rosen.childNodes).each( function(node) {
				rosen.removeChild(node);
			});
			$A(station_to.childNodes).each( function(node) {
				station_to.removeChild(node);
			});
			$A(station_from.childNodes).each( function(node) {
				station_from.removeChild(node);
			});
			var option = document.createElement('option');
				option.value = "";
				option.innerHTML = "▼選択";
				option.selected = true;
			rosen.appendChild(option.cloneNode(true));
			station_to.appendChild(option.cloneNode(true));
			station_from.appendChild(option);
			return true;
		}
		var area = $F('area');
		var url = '../js/return_line.html';
		var pars = 'area='+area+'&corp='+corp;
		var myAjax = new Ajax.Request(
			url, 
			{
				method: 'get', 
				parameters: pars,
				asynchronous: !sync,
				onComplete: function(req) { corpResponse(req, selected) }
			});
		if(sync) corpResponse(myAjax.transport, selected);
	}
	function corpResponse(origReq, selected) {
		$A($('rosenname').childNodes).each(function(node) {
			$('rosenname').removeChild(node);
		});
		origReq.responseText.ajax_filter().split("\n").each( function(node) {
			var pair = node.split(",");
			var option = document.createElement('option');
			option.value = pair[0];
			option.innerHTML = pair[1];
			if(option.value == selected) option.selected = true;
			$('rosenname').appendChild(option);
		});
		if(selected === undefined) $('rosenname').firstChild.selected = true;
		changeLine(true);
	}
	function changeLine(sync, selected) {
		var line = $F('rosenname');
		var url = '../js/return_station.html';
		var pars = 'line='+line;
		var myAjax = new Ajax.Request(
			url, 
			{
				method: 'post', 
				parameters: pars,
				asynchronous: !sync,
				onComplete: function(req) { lineResponse(req, selected) }
			});
		if(sync) {
			if(Prototype.Browser.WebKit) {
				changeLine(false);
			}
			lineResponse(myAjax.transport, selected);
		}
	}
	function lineResponse(origReq, selected) {
		var station_from = $('station_from');
		var station_to = $('station_to');
		$A(station_from.childNodes).each(function(node) {
			station_from.removeChild(node);
		});
		$A(station_to.childNodes).each(function(node) {
			$('station_to').removeChild(node);
		});
		var option = document.createElement('option');
		option.value = 0;
		option.innerHTML = "--全て--";
		station_from.appendChild(option);
		origReq.responseText.ajax_filter().split("\n").each( function(node) {
			var pair = node.split(",");
			var fromNode = document.createElement('option');
			fromNode.value = pair[0];
			fromNode.innerHTML = pair[1];
			toNode = fromNode.cloneNode(true);
			station_from.appendChild(fromNode);
			station_to.appendChild(toNode);
			if(selected !== undefined) {
				if(fromNode.value == selected[0]) fromNode.selected = true;
				if(fromNode.value == selected[1]) toNode.selected = true;
			}
		});
		station_to.disabled = false;
		if($F('station_from') == 0) changeStationFrom();
		if(selected === undefined) {
			station_from.firstChild.selected = true;
			changeStationFrom();
		}
	}
	function changeStationFrom() {
		var station_to = $('station_to');
		if($F('station_from') == 0) {
			station_to.disabled = true;
			if(station_to.lastChild.value != 0) {
				var option = document.createElement('option');
				option.value = 0;
				option.innerHTML = "--全て--";
				option.selected = true;
//				station_to.appendChild(option);
			}
		} else {
			station_to.disabled = false;
			if(station_to.lastChild.value == 0) {
				station_to.removeChild(station_to.lastChild);
			}
			$A(station_to.childNodes).each(function (node) {
				if(node.value == $F('station_from')) node.selected = true;
			});
		}
	}

	Event.observe(window, 'load', setDefault, false);
	
	function remove_custom_param() {
		if (location.search != '') {
			redirect_to = location.search.replace(/&(custom|master)=[A-Za-z0-9\-_]+/, '');
			document.write('&nbsp;<a href="javascript:location.href=\'/'+redirect_to+'\'">左記の条件を削除する</a>');
		}
	}
