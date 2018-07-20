<?php 
if (!defined('FLUX_ROOT')) exit;

$news_table = Flux::config('FluxTables.NewsTable');
$c=0;
$ptheme_errMsg = NULL;

if($news_table){

$sql = "SELECT title, body, link, author, created, modified FROM {$server->loginDatabase}.$news_table ORDER BY id DESC ";
$sql .= "LIMIT ".(int)Flux::config('LimitNews');
$sth = $server->connection->getStatement($sql);
$sth->execute();
$news = $sth->fetchAll();
}else{
	$ptheme_errMsg = 'FluxCMS Addons is not Installed. You can get it From rathena.org/download';
}
?>
				<table id="news" class="c2-table1">
					<tbody>
					<?php
					foreach($news as $n):
					?>
						<tr>
							<td class="text-left">
								<p class="title"><a target="_blank" href="<?php echo $n->link; ?>" style="color: #cbaf3c;"><?php echo $n->title; ?></a></p>
								<p class="author" style="color: #da5e02">Posted by: <b style="color:#cbaf3c;"><?php echo $n->author; ?></b></p>
							</td>
							<td class="text-right">
								<p class="date" style="color: #cbaf3c;margin-left: -100px;"><?php echo date("M-d-Y", strtotime($n->created)); ?></p>
							</td>
						</tr>
					<?php
					endforeach;
					?>				
					</tbody>
				</table>