<!--
waJSQuery(window).load(function () {

	waJSQuery(".wa-form5-button-submit").each(function(i)
	{
		var _but = waJSQuery(this)
		var _lnk = _but;//.parent("div");
		_lnk.css("cursor","pointer")
		_but.css("cursor","pointer")
		//_lnk.attr("target","")

		_lnk.click(function()
		{
			var _form = waJSQuery(this).parents("form")
			_waSubmitForm5(_form)
			return false;
		});
	/*
		_but.click(function()
		{
			var _form = waJSQuery(this).parents("form")
			_waSubmitForm(_form)
			return false;
		});
		*/
	});
});

function _waSubmitForm5(_form)
{
//	alert(_form.attr("class"))
	var _url = extractParamInfo(_form,"url")
	var _inputs = _form.find('select,input[type!=checkbox],textarea,div[class*=divCheckBox]')
	
	
	_inputs.each(function(i)
	{
		var _inEl = _inputs[ i ];
		var _elem = waJSQuery(this);
		var _max = parseInt(extractParamInfo(_elem,"max"))
		var _mandatory = extractParamInfo(_elem,"mandatory")
		var _isEmail = extractParamInfo(_elem,"email")
		alert(_elem)
		/*
		if ( _inEl.tagName.toLowerCase() == 'div' ) {
			if (_mandatory=="1")
			{
				var checkedCount = _elem.find("input[type=checkbox]:checked").size(); //find all checked checkboxes
				if ( checkedCount == 0 )
				{
					_elem.css("backgroundColor",backgroundError);
					_elem.focus();
					_bBreak = true;
					return false;
				}
			}
		}
		else
		{
			_elem.val(waJSQuery.trim(_elem.val()))
			//alert(extractParamInfo(_elem,"max"))
			var _val = _elem.val();
			var _valLength = _val != undefined ? _val.length : 0;

			if (_max>0)
			{
				if (_valLength>_max)
				{
					_elem.css("backgroundColor",backgroundError)
					_elem.focus()
					_bBreak = true;
					return false;
				}
			}

			if (_mandatory=="1")
			{
				var hasValidLength = _valLength > 0;

				if (!hasValidLength)
				{
					_elem.css("backgroundColor",backgroundError)
					_elem.focus()
					_bBreak = true;
					return false;
				}
			}

			if (_isEmail=="1")
			{
				if ((_valLength>0) && (isValidEmailAddress(_val)==false))
				{
					_elem.css("backgroundColor",backgroundError)
					_elem.focus()
					_bBreak = true;
					return false;
				}
			}
		}*/
	});
	
	//alert(_url)
}

-->
