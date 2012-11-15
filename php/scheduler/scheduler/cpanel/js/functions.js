/*
#This file contains various Javascript functions and arrays used on home page
*/
//Javascript functions used for Res/Com interchange in various fields
function change()
{
	if(document.getElementById)
	{
		if(document.browse_property.Mode[0].checked)
		{
			var code = document.getElementById("label_browse").innerHTML ;
			var newstr = 'check_cookie=1';
			var newcode = replaceAll( code, "check_cookie=2", newstr );
			var newcode = replaceAll( newcode, "check_cookie=3", newstr );
			document.getElementById("label_browse").innerHTML = newcode;
		}
		else
			if(document.browse_property.Mode[1].checked)
			{
				var newstr = 'check_cookie=2';
				var code = document.getElementById("label_browse").innerHTML ;
				var newcode = replaceAll( code, "check_cookie=1", newstr );
				var newcode = replaceAll( newcode, "check_cookie=3", newstr );
				document.getElementById("label_browse").innerHTML = newcode;
			}
			else
			{
				var newstr = 'check_cookie=3';
				var code = document.getElementById("label_browse").innerHTML ;
				var newcode = replaceAll( code, "check_cookie=1", newstr );
				var newcode = replaceAll( newcode, "check_cookie=2", newstr );
				document.getElementById("label_browse").innerHTML = newcode;
			}
	}
}

function check_PROP_ID()
{
	if(document.property.ID.value=="")
	{
		alert("Kindly enter a Property Code ");
		document.property.ID.focus();
		return false;
	}
	return true;
}
function setCityBudgetCookie(city,budget,mode)
{
        var now = new Date();
        fixDate(now);
        now.setTime(now.getTime() + 1 * 60 * 1000);

        if (city != 0)
        {
                for(i=0;i<city.options.length;i++)
                {
                        if(city.options[i].selected == true)
                        {
                                arg = city.options[i].value;
                                setCookie_exp('QS_CITY', arg, now,'/')
                                break;
                        }
                }
        }
        if(budget != 0)
        {
                for(i=0;i<budget.options.length;i++)
                   {
                        if(budget.options[i].selected == true)
                        {
                                arg = budget.options[i].value;
                                setCookie_exp('QS_BUDGET', arg, now,'/')
                               // break;
                        }
                }
        }
        if(mode != 0)
        {
                arg = mode
                setCookie_exp('QS_MODE', arg, now,'/')
        }
}


//Functions for changing the class of get alerts/new projects etc. divs below search bar
function changeFormClass(a){
	a.className='bl_serch_act';
}
function undoChangeFormClass(a){
	a.className='bl_serch';
}

/**
* Parameters:
* errorDiv - id of div that is to be made visible to show error
* errorMsg - id of element whose innerHTML will contaion the error messgae
* tbalt - value in alt attribute of button for showing the layer
**/
function validatePostProperty(errorDiv, errorMsg, tbalt)
{
        var docF=document.post_property;
        var errors = 0;
       	var errorStr = new Array();
       	errorStr[0] = "Please select ";
       	var index = 0;
        if(docF.res_com[0].checked)     //Residential Checked
        {
                if(document.getElementById('PostPropertyDDRes').selectedIndex==0)
                {
                	errorStr[++index] = "property";
                    errors++;
                }
                if(document.getElementById('OwnerDD').selectedIndex==0)
                {
                	errorStr[++index] = "ownership";
                    errors++;
                }
                if(document.getElementById('ModeDDRes').selectedIndex==0)
                {
                	errorStr[++index] = "transaction";
                    errors++;
                }

        }
        if(docF.res_com[1].checked)   //Commercial Checked
        {
                if(document.getElementById('PostPropertyDDCom').selectedIndex==0)
                {
                	errorStr[++index] = "property";
                    errors++;
                }
                if(document.getElementById('OwnerDD').selectedIndex==0)
                {
                	errorStr[++index] = "ownership";
                    errors++;
                }
                if(document.getElementById('ModeDDCom').selectedIndex==0)
                {
                	errorStr[++index] = "transaction";
                    errors++;
                }
        }
        if(errors>0)
        {
          	var errorText = errorStr[0];
           	for(var i=1; i<errorStr.length-1; i++)
           	{
           		errorText += errorStr[i] + ", ";
           	}
           	if(i != 1)
           	{
           		errorText = errorText.substring(0, errorText.length-2);
           		errorText += " and ";
           	}
           	errorText +=  errorStr[i];
           	errorText += " type.";

           	document.getElementById(errorMsg).innerHTML = errorText;
            document.getElementById(errorDiv).style.display = "block";

           	return false;
        }
		document.getElementById(errorDiv).style.display = "none";
		if(tbalt != null)
		{
        	tb_show(null, tbalt, null);
		}
}

/**
 * Function to change buttons class from active to inactive and vice versa
 * depending on if all dropdowns have been selected
*/
function changeButtonClass()
{
	var docF=document.post_property;
	var error = 0;
	if(docF.res_com[0].checked)     //Residential Checked
     {
	     if(document.getElementById('PostPropertyDDRes').selectedIndex==0 || document.getElementById('OwnerDD').selectedIndex==0 || document.getElementById('ModeDDRes').selectedIndex==0)
         {
			error++;
         }
     }
	if(docF.res_com[1].checked)   //Commercial Checked
    {
		if(document.getElementById('PostPropertyDDCom').selectedIndex==0 || document.getElementById('OwnerDD').selectedIndex==0 || document.getElementById('ModeDDCom').selectedIndex==0)
        {
        	error++;
        }
    }
    //using $() from jquery.js
    if(error)
    {
    	if(document.getElementById('postPropButton') != null)
    	{
    		$('#postPropButton').removeClass('but_act');
    		$('#postPropButton').addClass('but_unact');
    	}
    	else
    	{
    		$('#newUserButton').removeClass('but_act');
    		$('#existUserButton').removeClass('but_act');
    		$('#newUserButton').addClass('but_unact');
	    	$('#existUserButton').addClass('but_unact');
    	}
    }
    else
    {
    	if(document.getElementById('postPropButton') != null)
    	{
    		$('#postPropButton').removeClass('but_unact');
    		$('#postPropButton').addClass('but_act');
    	}
    	else
    	{
			$('#newUserButton').removeClass('but_unact');
			$('#existUserButton').removeClass('but_unact');
    		$('#newUserButton').addClass('but_act');
	    	$('#existUserButton').addClass('but_act');
    	}
    }
}
/*This file has all the Javascript functions
that are related to all form elements
*/
team = new Array(
new Array(
new Array("Below  7 lacs", 1),
new Array("7 to 15 lacs", 2),
new Array("15 to 25 lacs", 3),
new Array("25 to 40 lacs", 4),
new Array("40 to 60 lacs", 5),
new Array("60 to 100 lacs", 6),
new Array("1 to 1.5 crores", 7),
new Array("1.5 to 2 crores", 8),
new Array("2 to 2.5 crores", 9),
new Array("2.5 to 5 crores", 12),
new Array("5 to 10 crores", 13),
new Array("10 to 15 crores", 14),
new Array("15 to 20 crores", 15),
new Array("20 to 25 crores", 16),
new Array("25 to 30 crores", 17),
new Array("30 to 35 crores", 18),
new Array("35 to 40 crores", 19),
new Array("40 to 45 crores", 20),
new Array("45 to 50 crores", 21),
new Array("50 to 55 crores", 22),
new Array("55 to 60 crores", 23),
new Array("60 to 65 crores", 24),
new Array("65 to 70 crores", 25),
new Array("70 to 75 crores", 26),
new Array("75 to 80 crores", 27),
new Array("80 to 85 crores", 28),
new Array("85 to 90 crores", 29),
new Array("90 to 95 crores", 30),
new Array("95 to 100 crores", 31),
new Array("Above 100 crores", 10),
new Array("On Request", 11)
),
new Array(
new Array("Below 4000", 1),
new Array("4000 to 6,000", 2),
new Array("6,000 to 10,000", 3),
new Array("10,000 to 15,000", 4),
new Array("15,000 to 20,000", 5),
new Array("20,000 to 25,000", 6),
new Array("25,000 to 40,000", 7),
new Array("40,000 to 70,000", 8),
new Array("70,000 to 1 lac", 9),
new Array("1 lac to 1.5 lacs", 10),
new Array("1.5 lacs to 2 lacs", 11),
new Array("2 lacs to 5 lacs", 12),
new Array("5 lacs to 10 lacs", 13),
new Array("Above 10 lacs", 14),
new Array("On Request", 15)
)
);
function fillBudgetFromArray(form_name,sel)
{
	var qs_flag=0;

	if(form_name == null || form_name == "")
	form_name = "search_form";
	var x = "var selectCtrl = document"+"."+form_name+".Budget";
	eval(x);

	var x = "var docF = document"+"."+form_name;
	eval(x);
	if(docF.Mode[1].checked || (docF.Mode[2] && docF.Mode[2].checked))
	{
		var itemArray=team[1];
	}
	else
	{
		if(docF.Mode.value =='R' || docF.Mode.value == 'P')
		var itemArray=team[1];
		else
		var itemArray=team[0];
	}

	var i, j;
	var prompt;
	// empty existing items
	if(selectCtrl!="")
	{
		for (i = selectCtrl.options.length-1; i >= 0; i--)
		{
			selectCtrl.options[i] = null;
		}
	}
	goodPrompt="INR";
	badPrompt="INR";
	prompt = (itemArray != null) ? goodPrompt : badPrompt;
	if (prompt == null) {
		j = 0;
	}
	else
	{
		if(selectCtrl!="")
		{
			selectCtrl.options[0] = new Option(prompt);
			selectCtrl.options[0].value="0";
		}
		j = 1;
	}
	if (itemArray != null)
	{
		// add new items
		for (i = 0; i < itemArray.length; i++)
		{
			selectCtrl.options[j] = new Option(itemArray[i][0]);
			if (itemArray[i][1] != null)
			{
				selectCtrl.options[j].value = itemArray[i][1];
				if( sel != null)
				{
					if(sel == selectCtrl.options[j].value)
					selectCtrl.options[j].selected = true;
				}
				else /*if sel is not found, check for any set cookie*/
				{
					if(getCookie('QS_BUDGET') == selectCtrl.options[j].value)
					{
						selectCtrl.options[j].selected = true;
						qs_flag = 1;
					}
				}
			}
			j++;
		}
		// select first item (prompt) for sub list
		if(!qs_flag && sel == null)
		selectCtrl.options[0].selected = true;
	}
}
function PG_search()
{
	if(getCookie('RES_COM') != 'RES')
	{
		if(document.search_form.Mode[2])
		document.search_form.Mode[2].style.display = 'none';
		if(document.getElementById("PG"))
		document.getElementById("PG").style.display = 'none';
		if(document.getElementById("pgtd1"))
		document.getElementById("pgtd1").style.display = 'none';
		if(document.getElementById("pgtd2"))
		document.getElementById("pgtd2").style.display = 'none';
		return;
	}
	else
	{
		document.search_form.Mode[2].style.display = '';
		document.getElementById("PG").style.display = '';
		document.getElementById("pgtd1").style.display = '';
		document.getElementById("pgtd2").style.display = '';
	}
	if(document.search_form.Mode[1].checked)
	var val=document.search_form.Mode[1].value;
	else if(document.search_form.Mode[2].checked)
	var val=document.search_form.Mode[2].value;
	else
	var val=document.search_form.Mode[0].value;
	switch(val)
	{
		case 'R':
		document.search_form.Mode[2].style.display = '';
		document.getElementById("PG").style.display = '';
		document.search_form.PG.value = 'N';
		break;
		case 'S':
		document.search_form.PG.value = 'N';
		break;
		case 'P':
		document.search_form.PG.value = 'Y';
		break;
	}
}
function validate_alert()
{
	docF=document.property_alert;
	if((docF.email.value)== "")
	{
		alert("Please enter Email ID");
		docF.email.focus();
		return false;
	}
	if((docF.email.value)!="" && !checkemail(docF.email.value))
	{
		alert(docF.email.value + " is not a valid Email ID");
		docF.email.focus();
		return false;
	}
	if ((docF.email.value) == "")
	{
		alert("Please enter Email ID");
		docF.email.focus();
		return false;
	}
	if((docF.phone.value) == "")
	{
		alert("Please enter phone number!");
		docF.phone.focus();
		return false;
	}
	if(isNaN((docF.phone.value)))
	{
		alert("Invalid Phone No.! Please do not use any special characters! Like + ~ and ~");
		docF.phone.focus();
		return false;
	}
	var ph=(docF.phone.value);
	if(ph.substr(0,1)==9 && ( ph.length<10 || ph.length>15 ))
	{
		alert("Please enter a valid mobile No.!");
		docF.phone.focus();
		return false;
	}
	if(ph.substr(0,1)==0 && (ph.length<11 || ph.length>15 ))
	{
		alert("Please enter a valid Phone No.!");
		docF.phone.focus();
		return false;
	}
	if(ph.substr(0,1)=='+' && (ph.length<12 || ph.length>15 ))
	{
		alert("Please enter a valid Phone No.!!");
		docF.phone.focus();
		return false;
	}
	if(ph.substr(0,1)!=9 && ph.substr(0,1)!=0 && ph.substr(0,1)!='+')
	{
		alert("Please enter Phone No. with complete STD code/Area Code!");
		docF.phone.focus();
		return false;
	}
	if (docF.Budget.value == "0")
	{
		alert("Please enter Budget");
		docF.Budget.focus();
		return false;
	}
	var name1="citycode[]";
	for(var i=0; i<docF.elements.length ; i++)
	{
		if(docF.elements[i].name == name1)
		{
			var flag=0;
			for(var j=1;j<docF.elements[i].options.length;j++)
			{
				if(docF.elements[i].options[j].selected)
				flag=1;
			}
			if(!flag)
			{
				alert("Please select City");
				docF.elements[i].focus();
				return false;
			}
		}
	}
	return true;
}

/**
* Modified for home/city page revamp
* Parameters:
* errorDiv - id of div that is to be made visible to show error
* errorMsg - id of element whose innerHTML will contaion the error messgae
* tbalt - value in alt attribute of button for showing the layer
**/
function validate_property(errorDiv, errorMsg, tbalt)
{
	docF=document.post_property;
	if(docF.res_com[0].checked)     //Residential Checked
	{
		if(document.getElementById('PostPropertyDDRes').value=='0')
		{
			if(errorDiv != null)
			{
				document.getElementById(errorMsg).innerHTML = "Please select property type";
				document.getElementById(errorDiv).style.display = "block";
				document.getElementById('PostPropertyDDRes').focus();
				return false;
			}
			else
			{
				alert("Please select property type");
				document.getElementById('PostPropertyDDRes').focus();
				return false;
			}
		}
		if(document.getElementById('OwnerDD').value=='0')
		{
			if(errorDiv != null)
			{
				document.getElementById(errorMsg).innerHTML = "Please select Ownership type";
				document.getElementById(errorDiv).style.display = "block";
				document.getElementById('OwnerDD').focus();
				return false;
			}
			else
			{
				alert("Please select Ownership type");
				document.getElementById('OwnerDD').focus();
				return false;
			}
		}
		if(document.getElementById('ModeDDRes').value=='1')
		{
			if(errorDiv != null)
			{
				document.getElementById(errorMsg).innerHTML = "Please select Transaction type";
				document.getElementById(errorDiv).style.display = "block";
				document.getElementById('ModeDDRes').focus();
				return false;
			}
			else
			{
				alert("Please select Transaction type");
				document.getElementById('ModeDDRes').focus();
				return false;
			}
		}
	}
	if(docF.res_com[1].checked)   //Commercial Checked
	{
		if(document.getElementById('PostPropertyDDCom').value=='0')
		{
			if(errorDiv != null)
			{
				document.getElementById(errorMsg).innerHTML = "Please select property type";
				document.getElementById(errorDiv).style.display = "block";
				document.getElementById('PostPropertyDDCom').focus();
				return false;
			}
			else
			{
				alert("Please select property type");
				document.getElementById('PostPropertyDDCom').focus();
				return false;
			}
		}
		if(document.getElementById('OwnerDD').value=='0')
		{
			if(errorDiv != null)
			{
				document.getElementById(errorMsg).innerHTML = "Please select Ownership type";
				document.getElementById(errorDiv).style.display = "block";
				document.getElementById('OwnerDD').focus();
				return false;
			}
			else
			{
				alert("Please select Ownership type");
				document.getElementById('OwnerDD').focus();
				return false;
			}
		}
		if(document.getElementById('ModeDDCom').value=='1')
		{
			if(errorDiv != null)
			{
				document.getElementById(errorMsg).innerHTML = "Please select Transaction type";
				document.getElementById(errorDiv).style.display = "block";
				document.getElementById('ModeDDCom').focus();
				return false;
			}
			else
			{
				alert("Please select Transaction type");
				document.getElementById('ModeDDCom').focus();
				return false;
			}
		}
	}
	if(errorDiv != null)
	document.getElementById(errorDiv).style.display = "none";
	if(tbalt != null)
	tb_show(null, tbalt, null);
}
/* Function to start caching javascript files for inputproperty forms
@author: Poorva Misra
Dated: July 30, 2008
*/
function dynamicallyLoadFormsJs() {
	if(!document.getElementById('inputformsjs')) {
		var e = document.createElement("script");
		e.src = document.getElementById('Site_Url').value + "/property/cachedepdp.js";
		e.type="text/javascript";
		e.id = "inputformsjs"
		document.getElementsByTagName("head")[0].appendChild(e);
	}
}
/*ADD START 15.06.2006 (Tripti) For checking if someone has searched without entering locality*/
/* 08.04.2008 (Sidharth): Added parameters
* errorDiv - id of div containing error messgae to show/hide
* errorMsg - id of element which will contain error msg
*/
function check_city_empty(docF,name1,errorDiv,errorMsg)
{
	if(!docF)
	var docF=document.search_form;
	if(!name1)
	var name1="city";
	for(var i=0; i<docF.elements.length ; i++)
	{
		if(docF.elements[i].name == name1)
		{
			var flag=0;
			for(var j=1;j<docF.elements[i].options.length;j++)
			{
				if(docF.elements[i].options[j].selected)
				flag=1;
			}
			if(!flag)
			{
				if(errorDiv != null)
				{
					document.getElementById(errorMsg).innerHTML = "Please select City";
					document.getElementById(errorDiv).style.display = "block";
				}
				else
				{
					alert("Please select City");
				}
				docF.elements[i].focus();
				return false;
			}
		}
	}
	if(docF.type)
	{
		if(docF.type.value == 'L')
		{
			if(errorDiv != null)
			{
				document.getElementById(errorMsg).innerHTML = "Please select one option under LAND";
				document.getElementById(errorDiv).style.display = "block";
			}
			else
			{
				alert("Please select one option under LAND");
			}
			return false;
		}
	}
}
/*ADD END 15.06.2006 (Tripti) For checking if
someone has searched without entering locality*/

function trim(str)
{
	return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}

function validateSearchSubheader()
{
	var docF=document.search_form;

	if(docF.city.value=='0')
	{
		alert("Please select City");
		docF.city.focus();
		return false;
	}

	if(docF.type)
	{
		if(docF.type.value == 'L')
		{
			alert("Please select one option under LAND");
			return false;
		}
	}

	var keyword_elem = docF.keyword_str;
	var keyword_string = trim(keyword_elem.value);
	var pattern = new RegExp("^[a-zA-Z0-9,.' \-]+$");

	if(keyword_string.length)
	{
		if(keyword_string.length > 100)
		{
			alert("Please specify the keyword search criteria within 100 characters");
			return false;
		}
		else if(!pattern.test(keyword_string))
		{
			alert("Please specify words/phrases without any special characters. Example: Ansal, API, Omaxe, 110096");
			return false;
		}
	}

	if(getCookie('RES_COM') == 'COM')
	{
		var area_min = docF.area_min;
		var area_max = docF.area_max;
		var area_min_value = trim(area_min.value);
		var area_max_value = trim(area_max.value);

		if( area_min_value == '' )
		{
			area_min.value = area_min_value = 'Min';
		}

		if( area_max_value == '' )
		{
			area_max.value = area_max_value = 'Max';
		}

		//only check pattern if text in not Min/Max
		if( ( (area_min_value != 'Min') && (!isNum(area_min_value)) ) || ( (area_max_value != 'Max') && (!isNum(area_max_value)) ) )
		{
			alert("Please select a valid area range. Eg: 1200 to 1600 Sq.Ft");
			return false;
		}
		else
		{
			if(area_min_value == 'Min' || area_min_value == '')	{	area_min_value = 0;}
			if(area_max_value == 'Max' || area_max_value == '')	{	area_max_value = 0;}

			area_min_value = parseFloat(area_min_value);
			area_max_value = parseFloat(area_max_value);

			//check for error only when we are not having 'above Above N <units>' condition
			if( !(area_min_value && !area_max_value) && ( (area_min_value > area_max_value) || !isNum(area_min_value) || !isNum(area_max_value) ) )
			{
				alert("Please select a valid area range. Eg: 1200 to 1600 Sq.Ft");
				return false;
			}
		}
	}
}

function subheaderOnFocusEvents(divobj)
{
	if(divobj.name == 'area_min' || divobj.name == 'area_max')
	{
		if( ( (divobj.name == 'area_min') && (divobj.value == 'Min') ) || ( (divobj.name == 'area_max') && (divobj.value == 'Max') ) )
		{
			divobj.value = '';
		}
	}

	if(divobj.name == 'keyword_str')
	{
		if(divobj.value == "e.g. locality name, project name, pin code")
		{
			divobj.value = '';
			divobj.className = "ff1 t_size2";
		}
	}
}

function subheaderOnBlurEvents(divobj)
{
	if(divobj.name == 'area_min' || divobj.name == 'area_max')
	{
		if( (divobj.name == 'area_min') && (divobj.value == '') )
		{
			divobj.value = 'Min';
		}
		else if( (divobj.name == 'area_max') && (divobj.value == '') )
		{
			divobj.value = 'Max';
		}
	}

	if(divobj.name == 'keyword_str')
	{
		if(divobj.value == '')
		{
			divobj.className = "ff1 gray1 t_size2";
			divobj.value = "e.g. locality name, project name, pin code";
		}
	}
}

function isNum(str)
{
	var string = str + '';
	var flag=1;
	for (var i=0;i < string.length;i++)
	{
		if (((string.substring(i,i+1) < '0') || (string.substring(i,i+1) > '9')) && (string.substring(i,i+1) != "."))
		return false;
	}
	return true;
}

function isInt(string)
{
	var flag=1;
	for (var i=0;i < string.length;i++)
	{
		if ((string.substring(i,i+1) < '0') || (string.substring(i,i+1) > '9'))
		{
			return false;
		}
	}
	return true;
}
/* string : the string to be validated
invalidchar : array of invalid characters
*/
function validate_characters(string,invalidchar)
{	var invalid=true;
for(i=0;i<string.length;i++)
{
	for(j=0;j<invalidchar.length;j++)
	{
		if (string.charAt(i)==invalidchar[j])
		{
			invalid=false;
			break;
		}
	}
}
if(string.charAt(0)=='.' || string.charAt(0)=='\'')
invalid=false;
return invalid;
}
function isAlphanum(string)
{
	var invalidchar = new Array('#','\'','"','\\','/',' ','!','@','$','%','^','&','*','?','.',':','~','`','(',')','-','_','+','=','{','}','[',']','|','<','>',',',';');
	return validate_characters(string,invalidchar);
}
function isName(string)
{	var invalidchar = new Array('#','"','\\','!','@','$','%','^','&','*','?',':','~','`','(',')','_','+','=','{','}','[',']','|','<','>',';','1','2','3','4','5','6','7','8','9','0');
return validate_characters(string,invalidchar);
}
function isCompanyName(string)
{
	var invalidchar = new Array('#','"','!','@','$','%','^','&','*','?',':','~','`','_','+','=','{','}','[',']','|','<','>',';');
	return validate_characters(string,invalidchar);
}
function isCompany_Url(string)
{
	string=string.toLowerCase();
	if((string.substr(0,4))!= "http")
	string="http://"+string;
	var RegExp=/^(((ht|f)tp(s?))\:\/\/)([0-9a-zA-Z\-]+\.)+[a-zA-Z]{2,6}(\:[0-9]+)?(\/\S*)?$/
	//	var RegExp = /^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(([0-9]{1,5})?\/.*)?$/
	var str = RegExp.test(string);
	if(RegExp.test(string)){
		return true;
	}
	else
	return false;
}
function isPropertyName(string)
{
	var invalidchar = new Array('#','\\','!','@','$','%','^','*','?',':','~','`','_','+','=','{','}','[',']','|','<','>');
	return validate_characters(string,invalidchar);
}
function isNumText(string)
{
	var invalidchar = new Array('\'','"','\\','!','@','$','%','^','&','*','?',':','~','`','(',')','_','+','=','{','}','[',']','|','<','>');
	return validate_characters(string,invalidchar);
}
function invalid_user(username)
{
	var invalidchar = new Array('#','\'','"','\\','/',' ','!','$','%','^','&','*','?','@');
	return validate_characters(username,invalidchar);
}

function isEmail(str)
{
	var regex = /^[-_.a-z0-9]+@(([-_a-z0-9]+\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mobi|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i;
	return regex.test(str);
}
function checkemail(emailadd)
{
	//this is replaced by sandeep Beniwal for proper email validation.
	if (emailadd.length>50)
	return false;
	else if (emailadd.length<8)
	return false;
	else
	return isEmail(trim(emailadd));
}
function trim(inputString)
{

	if (typeof inputString != "string") { return inputString; }
	var retValue = inputString;
	var ch = retValue.substring(0, 1);
	while (ch == " ")
	{
		retValue = retValue.substring(1, retValue.length);
		ch = retValue.substring(0, 1);
	}
	ch = retValue.substring(retValue.length-1, retValue.length);
	while (ch == " ")
	{
		retValue = retValue.substring(0, retValue.length-1);
		ch = retValue.substring(retValue.length-1, retValue.length);
	}
	while (retValue.indexOf("  ") != -1)
	{
		retValue = retValue.substring(0, retValue.indexOf("  ")) + retValue.substring(retValue.indexOf("  ")+1, retValue.length);
	}
	return retValue;
}
function strlen(str)
{
	return str.length;
}
/*
Function name   :       checkNPerror
Created by      :       Puneet Chawla
Date            :       3 Apr 2007
Description     :       This function checks for any errors introduced by mismatched selection in case of New Projects
*/
function checkNPerror()
{
	var type = document.search_form.type;
	var mode = document.search_form.Mode;
	var show_newprojects = document.search_form.prop_newprojects;
	if(show_newprojects)
	{
		if ((type.value=='23' || type.value=='26' || show_newprojects.checked) && !(mode[0].checked || mode[0].selected))   //new project selected with Rent/PG Selected
		{
			var err = document.getElementById('error_msg');
			if(err)
			document.getElementById('error_msg').style.display="";
			else
			alert('Please Select "Buy" to View New Project Properties');
		}
		else
		{
			var err = document.getElementById('error_msg');
			if(err)
			document.getElementById('error_msg').style.display="none";
		}
	}
}
function check_property(val)
{
	var base=document.search_form;
	var show_newprojects = base.prop_newprojects;
	if(val==1)
	{
		base.prop_all.checked=true;
		base.prop_owner.checked=false;
		base.prop_builder.checked=false;
		base.prop_broker.checked=false;
		if(show_newprojects)
		base.prop_newprojects.checked=false;
	}
	if(val==2)
	{
		if(base.prop_owner.checked && base.prop_builder.checked && base.prop_broker.checked && (!show_newprojects || (show_newprojects && base.prop_newprojects.checked)))   //all except 'All' checked
		{
			base.prop_all.checked=true;
			base.prop_owner.checked=false;
			base.prop_builder.checked=false;
			base.prop_broker.checked=false;
			if(show_newprojects)
			base.prop_newprojects.checked=false;
		}
		if(!base.prop_owner.checked && !base.prop_builder.checked && !base.prop_broker.checked && (!show_newprojects || (show_newprojects && !base.prop_newprojects.checked)))
		{
			base.prop_all.checked=true;
			base.prop_owner.checked=false;
			base.prop_builder.checked=false;
			base.prop_broker.checked=false;
			if(show_newprojects)
			base.prop_newprojects.checked=false;
		}
		else
		{
			base.prop_all.checked=false;
		}
		checkNPerror();
	}
}
function check_type(index_type)
{
	if(!index_type)
	var index_type = document.search_form.type.value;
	var show_newprojects = document.search_form.prop_newprojects;
	if(index_type=='C' || (index_type >= 6 && index_type<= 21) || index_type==25 || index_type==81) //commercial
	{
		if(show_newprojects)
		{
			document.search_form.prop_newprojects.checked=false;
			document.search_form.prop_newprojects.disabled=true;
		}
		if(document.search_form.bedroom)
		document.search_form.bedroom.disabled=true;
		if(document.search_form.Mode.options)
		{
			document.search_form.Mode.options[1].text = 'Lease';
			document.search_form.Mode.options[2] = null;
		}
	}
	else
	{
		if(show_newprojects)
		document.search_form.prop_newprojects.disabled=false;
		if(document.search_form.bedroom)
		document.search_form.bedroom.disabled=false;
		if(document.search_form.Mode.options)
		{
			document.search_form.Mode.options[1].text = 'Rent';
			if(document.search_form.Mode.options.length==2)
			{
				document.search_form.Mode.options[2] = new Option('PG');
				document.search_form.Mode.options[2].value = 'P';
			}
		}
	}
}
function togglePostPropertyDD(x)
{
	if(x=='C')
	{
		document.getElementById('PostPropertyDDCom').disabled=false;
		document.getElementById('PostPropertyDDCom').name="type";
		document.getElementById('PostPropertyDDCom').style.display='block';

		document.getElementById('PostPropertyDDRes').disabled=true;
		document.getElementById('PostPropertyDDRes').style.display='none';
		document.getElementById('PostPropertyDDRes').name='type1';

		document.getElementById('ModeDDCom').disabled=false;
		document.getElementById('ModeDDCom').style.display='block';
		document.getElementById('ModeDDCom').name='mode';

		document.getElementById('ModeDDRes').disabled=true;
		document.getElementById('ModeDDRes').style.display='none';
		document.getElementById('ModeDDRes').name='mode1';
	}
	else
	{
		document.getElementById('PostPropertyDDCom').disabled=true;
		document.getElementById('PostPropertyDDCom').style.display='none';
		document.getElementById('PostPropertyDDCom').name='type1';

		document.getElementById('PostPropertyDDRes').disabled=false;
		document.getElementById('PostPropertyDDRes').style.display='block';
		document.getElementById('PostPropertyDDRes').name='type';

		document.getElementById('ModeDDCom').disabled=true;
		document.getElementById('ModeDDCom').style.display='none';
		document.getElementById('ModeDDCom').name='mode1';

		document.getElementById('ModeDDRes').disabled=false;
		document.getElementById('ModeDDRes').style.display='block';
		document.getElementById('ModeDDRes').name='mode';
	}
}

function check_search()
{
	var base=document.search_form;
	if(base.Mode.value=="-1" && base.city.value=="0" && base.type.value=="0" && base.Budget.value=="0" && base.bedroom.value=="0")
	{
		alert("User,kindly select one criterion for the search");
		return false;
	}
	else
	return true;
}

function isUsername(string)
{	var invalidchar = new Array('#','"','\\','/','!','$','%','^','&','*','?',':','~','`','(',')','+','=','{','}','[',']','|','<','>',';',',',' ');
return validate_characters(string,invalidchar);
}

function isValidFirstChar(string) {
	var invalidchar = new Array('#','"','\\','!','@','$','%','^','&','*','?',':','~','`','(',')','_','+','=','{','}','[',']','|','<','>',';',',','/','-','.',',',"'");
	return validate_characters(string,invalidchar);
}

function isCompanyProfile(string) {
	//var invalidchar = new Array('#','"','!','@','$','%','^','*','?',':','~','`','_','+','=','{','}','[',']','|','<','>',';');
	  var invalidchar = new Array('@');
	return validate_characters(string,invalidchar);
}

function isLocality(string)
{
	var invalidchar = new Array('#','"','\\','!','@','$','%','^','&','*','?',':','~','`','_','+','=','{','}','[',']','|','<','>',';') ;
	return validate_characters(string,invalidchar);
}

function isValidDescription(string) {
//	var invalidchar = new Array('#','\\','!','@','$','%','^','&','*','?',':','~','`','_','+','=','{','}','[',']','|','<','>',';');
	 var invalidchar = new Array('@');
	return validate_characters(string,invalidchar)
}

function isPassword(string) {
	var invalidchar = new Array('#','"','\\','!','@','$','%','^','&','*','?',':','~','`','(',')','_','+','=','{','}','[',']','|','<','>',';',',',' ','-');
	return validate_characters(string,invalidchar)
}

/***********************************************
* Drop Down/ Overlapping Content- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var gleft = 0;
var gtop = 0;
var gstr = 'xxx';
var gid =0 ;

function getposOffset(overlay, offsettype)
{
	var totaloffset=(offsettype=="left")? overlay.offsetLeft : overlay.offsetTop;
	var parentEl=overlay.offsetParent;
	while (parentEl!=null)
	{
		totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
		parentEl=parentEl.offsetParent;
	}
	return totaloffset;
}
function showhide(obj, e, visible, hidden, menuwidth)
{
	if (ie4||ns6)
	dropmenuobj.style.left=dropmenuobj.style.top="-500px"
	if (menuwidth!="")
	{
		dropmenuobj.widthobj=dropmenuobj.style
		dropmenuobj.widthobj.width=menuwidth
	}
	if (e.type=="click" && obj.visibility==hidden || e.type=="mouseover")
	obj.visibility=visible
	else if (e.type=="click")
	obj.visibility=hidden
}
function overlay(curobj, subobjstr, opt_position, isdivfordisplay)
{
	if (document.getElementById)
	{
		var subobj=document.getElementById(subobjstr)
		subobj.style.display=(subobj.style.display!="block")? "block" : "none"
		var xpos=getposOffset(curobj, "left")+((typeof opt_position!="undefined" && opt_position.indexOf("right")!=-1)? -(subobj.offsetWidth-curobj.offsetWidth) : 0)
		var ypos=getposOffset(curobj, "top")+((typeof opt_position!="undefined" && opt_position.indexOf("bottom")!=-1)? curobj.offsetHeight : 0)


		if(isdivfordisplay)
		{
			var divfordisplay = document.getElementById('divfordisplay');
			var divTopPos = divfordisplay.style.top;

			if( divTopPos == '290px' )	// for no cluster
			{
				if(screen.width == "800")
				ypos = ypos - 285;
				else
				ypos = ypos - 290;

			}
			else if( (divTopPos == '422px') || (divTopPos == '410px'))	// less cluster
			{
				if(screen.width == "800")
				ypos = ypos - 418;
				else
				ypos = ypos - 410;

			}
			else if( (divTopPos == '475px') || (divTopPos == '488px') )	// for more cluster
			{
				if(screen.width == "800")
				ypos = ypos - 482;
				else
				ypos = ypos - 475;

			}

			if(gstr != isdivfordisplay)
			{
				gleft = 0;
				gtop = 0;
			}
			gstr = isdivfordisplay;
			gid = isdivfordisplay;

			if(gleft == 0 && gtop == 0)
			{

			}
			else
			{

				xpos = gleft;
				ypos = gtop;
			}

			subobj.style.left="150px"
			gleft = xpos;
			gtop = ypos;

		}
		else
		{
			subobj.style.left=xpos+"px"
		}
		subobj.style.top=ypos+"px"
		return false
	}
	else
	return true
}

function overlayclose(subobj)
{
	document.getElementById(subobj).style.display="none"
}

function MM_openBrWindow(theURL,winName,features) //v2.0
{
	window.open(theURL,winName,features);
}
/* Javascript functions for images on subheader and their mouseover effects....
Added by Sumit on 13 Aug 2005                                        */

function MM_preloadImages() { //v3.0
	//Function Call added to check whether Residential or Commercial cookie is set
	cookie_start();
	var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
	var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
	if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
	var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
	var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
		if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
		if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
	var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
/*
name - cookie name
value - cookie value
[expires] - expiry date of the cookie
(defaults to end of current session)
[path] - path for which the cookie is valid
(defaults to path of calling document)
[domain] - domain for which the cookie is valid
(defaults to domain of calling document)
[secure] - Boolean value indicating if the cookie transmission requires a secure transmission
* an argument defaults when it is assigned null as a placeholder
* a null placeholder is not required for trailing omitted arguments
*/

function setCookie_exp(name, value, expires, path, domain, secure) {

	var curCookie = name + "=" + escape(value) +((expires) ? "; expires=" + expires.toGMTString() : "") +((path) ? "; path=" + path : "") +((domain) ? "; domain=" + domain : "") +((secure) ? "; secure" : "");
	document.cookie = curCookie;
}
function setCookie()
{
	if(document.browse_property.Mode[0].checked)
	var value='S';
	else
	var value='R';

	var now = new Date();
	fixDate(now);
	now.setTime(now.getTime() + 30 * 24 * 60 * 60 * 1000);
	setCookie_exp('deal_mode', value, now,'/')
	return true;
}
/*
name - name of the desired cookie
return string containing value of specified cookie or null
if cookie does not exist
*/
function getCookie(name) {
	var dc = document.cookie;
	var prefix = name + "=";
	var begin = dc.indexOf("; " + prefix);
	if (begin == -1) {
		begin = dc.indexOf(prefix);
		if (begin != 0) return null;
	} else
	begin += 2;
	var end = document.cookie.indexOf(";", begin);
	if (end == -1)
	end = dc.length;
	return unescape(dc.substring(begin + prefix.length, end));
}
/*
name - name of the cookie
[path] - path of the cookie (must be same as path used to create cookie)
[domain] - domain of the cookie (must be same as domain used to
create cookie)
path and domain default if assigned null or omitted if no explicit
argument proceeds
*/

function deleteCookie(name, path, domain) {
	if (getCookie(name)) {
		document.cookie = name + "=" +
		((path) ? "; path=" + path : "") +
		((domain) ? "; domain=" + domain : "") +
		"; expires=Thu, 01-Jan-70 00:00:01 GMT";
	}
}
function cookie_start()
{
	var now = new Date();
	now.setTime(now.getTime() + 30 * 24 * 60 * 60 * 1000);
	current = getCookie('RES_COM');
	if(current == 'RES')
	{
		if(document.search_form)
		{
			if(document.search_form.type)
			document.search_form.type.options[0].value = 'R';
			if(document.search_form.Mode.options)
			document.search_form.Mode.options[1].text = 'Rent';
		}
		setStyleByClass('*','formcomm','background-color','#000000','formres');
	}
	else if(current == 'COM')
	{
		if(document.search_form)
		{
			if(document.search_form.Mode.options)
			document.search_form.Mode.options[1].text = 'Lease';
			if(document.search_form.type)
			document.search_form.type.options[0].value = 'C';
		}
		setStyleByClass('*','formres','background-color','#000000','formcomm');
	}
	else
	setCookie_exp('RES_COM','RES',now,'/')
}
function toggleCookie(arg)
{
	var now = new Date();
	fixDate(now);
	now.setTime(now.getTime() + 30 * 24 * 60 * 60 * 1000);
	setCookie_exp('RES_COM', arg, now,'/')

}

// setStyleByClass: given an element type and a class selector,
// style property and value, apply the style.
// args:
//  t - type of tag to check for (e.g., SPAN)
//  c - old class name
//  p - CSS property
//  v - value
//  w - new class name
function setStyleByClass(t,c,p,v,w)
{
	var ie = (document.all) ? true : false;
	var now = new Date();
	fixDate(now);
	now.setTime(now.getTime() + 30 * 24 * 60 * 60 * 1000);
	if(w == 'formres')
	{
		setCookie_exp('RES_COM', 'RES', now,'/')
		/*if(document.getElementById("bedroomtag"))
		document.getElementById("bedroomtag").style.visibility="visible";*/
	}
	else
	{
		setCookie_exp('RES_COM', 'COM', now,'/');
		/*if(document.getElementById("bedroomtag"))
		document.getElementById("bedroomtag").style.visibility="hidden";*/
	}
}
function changetype(type,check)
{
	var restype = new Array(),comtype= new Array(),rescount=0,comcount=0;
	var cookiecol = getCookie('RES_COM');
	var flag = 0;
	if(document.search_form)
	var typedd = document.search_form.type;
	switch(type)
	{
		case 'com':
		if(check == 1)
		return;
		if(cookiecol == 'COM')
		return;
		break;
		case 'res':
		if(check == 1)
		break;
		if(cookiecol == 'RES')
		return;
		break;
	}
	if(typedd)
	{

		switch(cookiecol)
		{
			case 'RES':
			var diff = 'C';
			break;
			case 'COM':
			var diff = 'R';
			break;
		}
		if(check == 1)
		var diff='C';
		for(var i=0;i<typedd.options.length-1;i++)
		{
			if(typedd.options[i].value == 'L')
			break;
			if(typedd.options[i].value == diff)
			flag = 1
			switch(flag)
			{
				case 0:
				restype[rescount++] = typedd.options[i];
				break;
				case 1:
				comtype[comcount++] = typedd.options[i];
				break;
			}
		}
		var a=0,b=0;
		var total = typedd.options.length;
		for(var i=0;i<total-1;i++)
		{
			if(typedd.options[i].value == 'L')
			break;
			if(i < comcount)
			{
				typedd.options[i] = new Option(comtype[a++].text);
				typedd.options[i].value = comtype[a-1].value;
				typedd.options[i].selected = comtype[a-1].selected;
			}
			if(i >= comcount)
			{
				typedd.options[i] = new Option(restype[b++].text);
				typedd.options[i].value = restype[b-1].value;
				typedd.options[i].selected = restype[b-1].selected;
			}
			if(typedd.options[i].value == 'L' || typedd.options[i].value == 'R' || typedd.options[i].value== 'C')
			typedd.options[i].className = 'boldclass';

		}
		if(check != 1)
		typedd.options[0].selected = true;
	}
}
function change_images(){}
function onmousechangesrc(){}
function overmousechangesrc(){}
// date - any instance of the Date object
// * hand all instances of the Date object to this function for "repairs"
function fixDate(date) {
	var base = new Date(0);
	var skew = base.getTime();
	if (skew > 0)
	date.setTime(date.getTime() - skew);
}
/*3 Functions copied from propadmin.js for reloading parent*/
function reloadParent()
{
	var func = "Reload()";
	window.opener.Timer(func);
}
function Timer(func)
{
	setTimeout(func,1000);
}
function Reload()
{
	window.location.href = window.location.href;
}
function replaceAll( str, from, to )
{
	var idx = str.indexOf( from );
	while ( idx > -1 )
	{
		str = str.replace( from, to );
		idx = str.indexOf( from );
	}
	return str;
}
//Function for appending cat_code....
function change_value(new_code)
{
	docF= window.opener.document.form1;
	docF.cat_code.value= docF.cat_code.value+','+new_code;
	prop_id=docF.PROP_ID.value;
	str= window.opener.location.href;
	end= str.indexOf('&from');
	if(end == -1)
	original_href=str;
	else
	original_href=str.substr(0,end-1);
	window.opener.location.href= original_href+'&from=popup&PROP_ID='+prop_id+'&cat_code='+docF.cat_code.value;
	this.close();
}
/*
Function to open a given script in a new window
saurabh:edited to open custom sized window for clicks from quick search page
flag:'QS'	Clicks from quick search page
flag:
to add custom sizes for popup window from different pages add TAG and description here
*/
function open_new_window(path,flag)
{
	if(!flag)
	{
		window.open(path,'','width=800,height=570,scrollbars=yes,resizable=1');
		return false;
	}
	else if(flag=='QS')	//to open window from quick search page
	{
		if((screen.width <= 800) && (screen.height <= 600))
		{
			window.open(path,'','width=784,height=543,scrollbars=1,resizable=1');
		}
		else
		{
			window.open(path,'','width=958,height=702,scrollbars=1,resizable=1');
		}
		return false;
	}
	else if(flag=='LAD')	//to open window for LAD
	{
		if((screen.width <= 800) && (screen.height <= 600))
		{
			window.open(path,'','width=790,height=426,scrollbars=1,resizable=1,location=1,toolbar=1,menubar=1');
		}
		else
		{
			window.open(path,'','width=958,height=592,scrollbars=1,resizable=1,location=1,toolbar=1,menubar=1');
		}
		return false;
	}
	else if(flag=='DP')	//to open window for LAD
	{
		if((screen.width <= 800) && (screen.height <= 600))
		{
			window.open(path,'','width=790,height=570,scrollbars=1,resizable=1');
		}
		else
		{
			window.open(path,'','width=958,height=702,scrollbars=1,resizable=1');
		}
		return false;
	}else if(flag=='FullWindow')
	{
		if((screen.width <= 800) && (screen.height <= 600))
		{
			window.open(path,'','width=800,height=600,scrollbars=1,resizable=1');
		}
		else
		{
			window.open(path,'','width=1024,height=768,scrollbars=1,resizable=1');
		}
		return false;
	}

}


/** Functions for change city dropdown in subheader **/

function show(va_l) {
	var coors = findPosit(va_l);
	d_n=document.getElementById("dropmenudiv").style;
	d_n.top=coors[1]+coors[3]+5 +'px';
	d_n.left=coors[0] +'px';
	d_n.display="";
	var value_=false;
	d_i=document.getElementById("iframeshim");
	d_i.style.top=d_n.top;
	d_i.style.left=d_n.left;
	d_i.style.width=d_n.width;
	d_i.style.height=d_n.height;
	d_i.style.display="";
	document.getElementById("dropmenudiv").onmouseover=function() {
		d_n.display="";
		d_i.style.display="";
		value_=true;
		clearTimeout(a)
	}
	document.getElementById("dropmenudiv").onmouseout=function() {
		d_n.display="none";
		d_i.style.display="none"
	}
	a=setTimeout("chk("+value_+")",2000)
}

function findPosit(obj)
{
	var curleft = curtop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		curW = obj.offsetWidth
		curH = obj.offsetHeight
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
		}
	}
	return [curleft,curtop,curW,curH];
}

function chk(value_) {
	if(value_==false) {
		d_n.display="none";
		d_i.style.display="none"
	} else {
		d_n.display=""
	}
}
/** Functions for change city dropdown in subheader END**/


/*
Moved from homepage.js
Function name   :       setTypevalue
Created by      :       Gunjan Kathuria
Date            :       19 Dec 2006
Description     :       This function sets the cookie and reloads the page when a property type is selected from select and cookie RES_COM is not of Property Type
*/
function setTypevalue()
{
	var type_search=document.search_form.type.value;
	resarray= new Array('R','1','2','3','4','5','22','23','80');
	comarray= new Array('C','26','6','7','9','10','11','12','13','14','15','16','17','18','19','20','21','81');
	var x = getCookie("RES_COM")
	if(x=='COM')
	for(var i=0;i<resarray.length;i++)
	if(resarray[i]==type_search)
	{
		setCookie_exp('getType',type_search);
		location.href="/Residential";
	}
	if(x=='RES')
	for(var i=0;i<comarray.length;i++)
	if(comarray[i]==type_search)
	{
		setCookie_exp("getType",type_search);
		location.href="/Commercial";
	}
}
function fillSelectFromArray_alert(sel)
{
 	if(document.form1.preference)
	{	
		var selectCtrl=document.form1.Budget;
		if(document.form1.preference[1].checked)
		{
			var itemArray=team[1];
		}
		else
		{	
			var itemArray=team[0];
		}
		var i, j;
		var prompt;
		// empty existing items
		if(selectCtrl!="")
		for (i = selectCtrl.options.length-1; i >= 0; i--)
		{
			selectCtrl.options[i] = null;
		}
		goodPrompt="Budget";
		badPrompt="Budget";
		prompt = (itemArray != null) ? goodPrompt : badPrompt;
		if (prompt == null) 
		{
			j = 0;
		}	
		else 
		{
			if(selectCtrl!="")
			{
				selectCtrl.options[0] = new Option(prompt);
				selectCtrl.options[0].value="0";
			}
			j = 1;
		}
		if (itemArray != null) 
		{
			// add new items
			for (i = 0; i < itemArray.length; i++) 
			{
				selectCtrl.options[j] = new Option(itemArray[i][0]);
				if (itemArray[i][1] != null) 
				{
					selectCtrl.options[j].value = itemArray[i][1];
					if (sel == itemArray[i][1])
					{
						selectCtrl.options[j].selected = true;
					}
				}
				j++;
			}
			// select first item (prompt) for sub list
			if(sel == null)
			selectCtrl.options[0].selected = true;
		}
	}	
}
