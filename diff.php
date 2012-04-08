<?php
	
	include "includes/common.php";
	include "includes/geshi/geshi.php";
	
	$cid = (int)$_GET["id" ];
	
	$result = $db->SelectFirst( "snippets, languages", "snippets.language = languages.lang_id AND snippets.id = '$cid'" );
	if (is_null($result))
	{
		header( 'Location: /' ) ;
	}
	$altres = array();
	
	if( $result[ "alter" ] > -1 )
	{
		$altres = $db->SelectFirst( "snippets", "id = '$result[alter]'" );
	}
	
	$showCodeButtons = true;
	$page = "View Diff";
	$lang = $result["language" ];
	include "includes/page/header.php";
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/dojo/1.6.0/dojo/dojo.xd.js"></script>
<script type="text/javascript" src="/js/diffview.js"></script>
<script type="text/javascript" src="/js/difflib.js"></script>

<script language="javascript">
var $ = dojo.byId;
var url = window.location.toString().split("#")[0];

function diffUsingJS () {
	var base = difflib.stringAsLines(<?php echo json_encode($altres['code']);?>);
	var newtxt = difflib.stringAsLines(<?php echo json_encode($result['code']);?>);
	var sm = new difflib.SequenceMatcher(base, newtxt);
	var opcodes = sm.get_opcodes();
	var diffoutputdiv = $("diffdiv");
	while (diffoutputdiv.firstChild) diffoutputdiv.removeChild(diffoutputdiv.firstChild);
	contextSize = "1";
	contextSize = contextSize ? contextSize : null;
	diffoutputdiv.appendChild(diffview.buildView({ baseTextLines:base,
												   newTextLines:newtxt,
												   opcodes:opcodes,
												   baseTextName:<?php echo json_encode($altres['sname']);?>,
												   newTextName:<?php echo json_encode($result['sname']);?>,
												   contextSize:contextSize,
												   viewType: 0 }));
}
window.onload = function () { diffUsingJS(); };

</script>
<div class="well"> <pre id="diffdiv"></pre></div>

	<?php include "includes/page/footer.php"; ?>

