<td style="vertical-align:top;width:25%">
	<?php include "function/sidebar.php"; ?>
</td>
</tr>
</table>
</div>
<?php include "function/menu_footer.php"; ?>
<div class="footer">
	<?php echo $option_footer;?>
	<a target="_blank" style="color:#fff;" href="/sitemap.php">sitemap |</a><a target="_blank" style="color:#fff;" href="/sitemap.xml">sitemap xml</a>
</div>
<script type="text/javascript">SyntaxHighlighter.all();</script>
</body>
</html>
<?php mysqli_close($conn);?>