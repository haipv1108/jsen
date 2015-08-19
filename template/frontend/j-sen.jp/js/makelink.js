<!--

function makelink(url, str, target) {
	if (str == null) str = url;
	if (target != null) target = ' target="' + target + '"';
	else target = '';
	while(url.match("<wbr>")) {
		url = url.replace("<wbr>", "");
	}
	document.write("<a href=\"" +  url + "\"" + target + ">" + str + "</a>") ;
}

function makemailto(str, domain, namae) {
	var meru = "mailto:" + namae + "@" + domain;
	if (str == null) str = namae + "@" + domain;
	document.write("<a href=\"" +  meru + "\">" + str + "</a>") ;
}

-->