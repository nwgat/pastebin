<?php
	
	$page = "Browse Pastes";
	
	include "includes/common.php";
	include "includes/page/header.php";
	
	$page = ( isset($_GET["p"]) ? (int)$_GET["p"] : 1 );
	
	$offset = ($page-1)*5;
	
	$snippets = $db->QueryArray( 'SELECT id, sname, SUBSTRING(code, 1, 200) as codesub FROM snippets WHERE private = 0 ORDER BY id DESC LIMIT 5 OFFSET ' . $offset );
	$count = $db->QueryArray( "SELECT COUNT(id) FROM snippets WHERE private = 0" );
?>

	<div class="pagination pagination-right">
		<ul>
			<li<?php if($page == 1):?> class="disabled"<?php endif; ?>><a href="?p=<?php echo $page-1; ?>">&laquo;</a></li>
			<?php for( $i = max(1,$page-5); $i <= min( ceil($count[0][0]/5), $page+5 ); $i++ ): ?>
			<li<?php if($page == $i): ?> class="active"<?php endif; ?>><a href="?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php endfor; ?>
		</ul>
	</div>
	
<?php foreach($snippets as $k => $v ): ?>
	<div class="well">
		<h4><?php echo (!empty($v["sname"]) ? htmlentities($v["sname"]) : "Untitled" ); ?></h4>
		<pre><?php echo htmlentities($v["codesub"]); ?><?php if(strlen($v["codesub"]) >= 150 ): ?>...<?php endif; ?></pre>
		<a href="<?php echo $v["id"]; ?>">View all</a>
	</div>
<?php endforeach; ?>

	<div class="pagination pagination-right">
		<ul>
			<li<?php if($page == 1):?> class="disabled"<?php endif; ?>><a href="?p=<?php echo $page-1; ?>">&laquo;</a></li>
			<li<?php if($page >= ceil($count[0][0]/5)):?> class="disabled"<?php endif; ?>><a href="?p=<?php echo $page+1; ?>">&raquo;</a></li>
		</ul>
	</div>
<?php include "includes/page/footer.php"; ?>