<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": About");
?>
<H1><?php print _t("About"); ?></H1>
<div class="row">
	<div class="col-sm-6 col-md-6">
		<p>The scholarship devoted to the history of past print culture in Europe is vast, and interest in reading practices has led to important studies in the 90ies. The habits and tastes of ordinary readers have also been explored through “Reading Experience” databases in the UK and the Netherlands. Yet, it tends to be addressed on a national level and from a single disciplinary perspective. Besides, compared to Gutenberg’s technological revolution of the 15th century or to the “reading revolution” of the 18th century, today’s digital revolution is so multi-faceted that it requires a new comparative and interdisciplinary approach 
The European network of leading experts in the field of Reading studies involved in the Action P-RECICH will address these challenges through a 24 months feasibility study that will prepare a grant proposal to a Horizon 2020 European research programme.</p>

<p>In view of this, its scientific programme is designed to evaluate the main factors impacting current reading practices, learning processes and social awareness in Europe. Four thematic working groups will take a comparative approach to the diversity of European reading experiences, industries and policies in order to identify landmarks in reading history, not only at a national level, but also across borders. They will sketch out how new devices (audiobooks, e-books, tablets,) are inspiring new commercial strategies and creating new experiences for readers, who are confronted with texts in multiple versions and formats. An additional technical support group will draw the outline of an innovative European Reading Experience Database (Eu-RED). </p>
<p>This online database is the result of our first tryouts.</p>
	</div>
	<div class="col-sm-6 col-md-6">
<?php
	print caNavLink($this->request, caGetThemeGraphic($this->request, 'about-image.png'), "about-image", "", "","");
?>
<p>Sir Walter Firle, <i>The Fairy Tale</i>, <a href="https://www.flickr.com/photos/eoskins/sets/72157630821829278/page1/">found on flickr "Books&Reading in Art"</a></p>
		<p><b>This database, its contents, metadata structures are not stable for now.<br/>This is only a testing database.</b></p>
		<p>Hosting by <a href="http://www.univ-lemans.fr">University Le Mans</a>.</p>
		<p><a href="https://thenounproject.com/term/book/7930/">Book icon</a> by Derrick Snider. Austin, Texas, US 2012</p>
	</div>
</div>
