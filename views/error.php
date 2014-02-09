<!--A framework error has occured :( --->
<style>
.framework-error {

	font-family:Verdana;
	display:inline-block;
	box-shadow: 0 0 30px #000;
}
.framework-table{
	border:1px solid #fff;
	border-collapse:collapse;
	color:#fff;
	
}
.framework-table td{
border:1px solid #fff;
	padding:5px;
}
.framework-clear{
	clear:both;
}
</style>
<div class="framework-clear"></div>
<div style="background-color:#BA1E2E;color:white;" class="framework-error">
    <h2 style="padding:0px 5px;">An error has occured!</h2>
    <table border="1" class="framework-table">
        <tr><td>Error code:</td><td><?=$data['errno']?></td></tr>
        <tr><td>Error description:</td><td><?=$data['errstr']?></td></tr>
        <tr><td>Error file:</td><td><?=$data['errfile']?></td></tr>
        <tr><td>Error line:</td><td><?=$data['errline']?></td></tr>
        <tr><td>Error context:</td><td><pre><?=print_r($data['errstr'])?></pre></td></tr>
    </table>
</div>
<div class="framework-clear"></div>
