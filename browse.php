<?php
	
	$page = "Browse Pastes";
	
	include "includes/common.php";
	include "includes/page/header.php";
	
	$page = ( isset($_GET["p"]) ? max((int)$_GET["p"], 1 ) : 1 );
	$search = ( isset($_GET["s"]) ? $_GET["s"] : '' );

	$urlappend = ( !empty($search) ? '&amp;s=' . htmlentities($search) : '' );
	$additionalsql = ( !empty($search) ? 'AND (`sname` LIKE \'%' . $db->SanitizeString($search) . '%\' OR `code` LIKE \'%' . $db->SanitizeString($search) . '%\' )' : '' );
	
	$show = ( isset($_GET["show"]) ? min((int)$_GET["show"], 15 ) : 5 );
	$offset = ($page-1)*$show;
	
	$snippets = $db->QueryArray( 'SELECT id, sname, SUBSTRING(code, 1, 200) as codesub FROM snippets WHERE private = 0 ' . $additionalsql . ' ORDER BY id DESC LIMIT ' . $show . ' OFFSET ' . $offset );
	$count = $db->QueryArray( 'SELECT COUNT(id) FROM snippets WHERE private = 0 ' . $additionalsql );
	
	$pagination_start = max( 1, $page-7 );
?>

	<?php if( !empty($search) ): ?>
		<h4>Searching for <?php echo htmlentities($search); ?></h4>
	<?php endif; ?>
	
	<div class="pagination pagination-right">
		<ul>
			<li<?php if($page == 1):?> class="disabled"<?php endif; ?>><a href="?p=<?php echo $page-1 . $urlappend; ?>">&laquo;</a></li>
			<?php for( $i = $pagination_start; $i <= min( $pagination_start+7, ceil( $count[0][0]/$show ) ); $i++ ): ?>
			<li<?php if($page == $i): ?> class="active"<?php endif; ?>><a href="?p=<?php echo $i . $urlappend; ?>"><?php echo $i; ?></a></li>
			<?php endfor; ?>
			<li<?php if($page >= ceil($count[0][0]/$show)):?> class="disabled"<?php endif; ?>><a href="?p=<?php echo $page+1 . $urlappend; ?>">&raquo;</a></li>
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
			<li<?php if($page == 1):?> class="disabled"<?php endif; ?>><a href="?p=<?php echo $page-1 . $urlappend; ?>">&laquo;</a></li>
			<li<?php if($page >= ceil($count[0][0]/$show)):?> class="disabled"<?php endif; ?>><a href="?p=<?php echo $page+1 . $urlappend; ?>">&raquo;</a></li>
		</ul>
	</div>
<?php include "includes/page/footer.php"; ?>