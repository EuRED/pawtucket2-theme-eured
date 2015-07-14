<?php
	$t_object = $this->getVar("item");
	$va_comments = $this->getVar("comments");

    $vs_xml_url = $t_object->get("ca_objects.tei_xml_source", array("return"=>"url") );
    $vs_xml_path = $t_object->get("ca_objects.tei_xml_source", array("return"=>"path") );

    AssetLoadManager::register('highlightjs');
?>

<div class="row">
	<div class='col-xs-12 navTop'><!--- only shown at small screen size -->
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
	</div><!-- end detailTop -->
	<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgLeft">
			{{{previousLink}}}{{{resultsLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
	<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
		<div class="container">
            <div class="row">
                    <H4>{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H4>
                    <H6>{{{<unit>^ca_objects.type_id</unit>}}}</H6>
                    <HR>
            </div>
            <div class="row">
                <div class='col-sm-6 col-md-6 col-lg-6 columnViewer leftColumn'>
                    <div class="viewerButtons">
                        <b>Visionneuse : </b>
                        <a role="button" data-toggle="collapse" data-parent="#collapsible1" href="#collapseA1" aria-expanded="true" aria-controls="collapseA1">
                            Media
                        </a>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible1" href="#collapseA2" aria-expanded="false" aria-controls="collapseA2">
                            Texte
                        </a>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible1" href="#collapseA3" aria-expanded="false" aria-controls="collapseA3">
                            Transcription
                        </a>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible1" href="#collapseA4" aria-expanded="false" aria-controls="collapseA4">
                            Métadonnées
                        </a>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible1" href="#collapseA5" aria-expanded="false" aria-controls="collapseA5">
                            Relations
                        </a>
                        <?php if($vs_xml_url): ?>
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible1" href="#collapseA6" aria-expanded="false" aria-controls="collapseA6">
                                XML
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="panel-group" id="collapsible1" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div id="collapseA1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                                <div class="well">
                                    {{{representationViewer}}}

                                    <?php print caObjectRepresentationThumbnails($this->request, $this->getVar("representation_id"), $t_object, array("returnAs" => "bsCols", "linkTo" => "carousel", "bsColClasses" => "smallpadding col-sm-3 col-md-3 col-xs-4")); ?>

                                    <div id="detailTools">
                                        <div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment"></span>Comments (<?php print sizeof($va_comments); ?>)</a></div><!-- end detailTool -->
                                        <div id='detailComments'>{{{itemComments}}}</div><!-- end itemComments -->
                                        <div class="detailTool"><span class="glyphicon glyphicon-share-alt"></span>{{{shareLink}}}</div><!-- end detailTool -->
                                    </div><!-- end detailTools -->
                                </div>


                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div id="collapseA2" class="panel-collapse collapse" role="tabpanel">
                                <iframe style="width:100%;height:650px;" src="/index.php/EuRED/TEIBoilerplate/Display/object/<?php print $t_object->get("object_id"); ?>/displayMode/text"></iframe>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div id="collapseA3" class="panel-collapse collapse" role="tabpanel">
                                <iframe style="width:100%;height:650px;" src="/index.php/EuRED/TEIBoilerplate/Display/object/<?php print $t_object->get("object_id"); ?>"></iframe>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div id="collapseA4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <H4>{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H4>
                                <H6>{{{<unit>^ca_objects.type_id</unit>}}}</H6>

                                {{{<ifdef code="ca_objects.measurementSet.measurements">^ca_objects.measurementSet.measurements (^ca_objects.measurementSet.measurementsType)</ifdef><ifdef code="ca_objects.measurementSet.measurements,ca_objects.measurementSet.measurements"> x </ifdef><ifdef code="ca_objects.measurementSet.measurements2">^ca_objects.measurementSet.measurements2 (^ca_objects.measurementSet.measurementsType2)</ifdef>}}}


                                {{{<ifdef code="ca_objects.idno"><H6>Identifer:</H6>^ca_objects.idno<br/></ifdef>}}}
                                {{{<ifdef code="ca_objects.containerID"><H6>Box/series:</H6>^ca_objects.containerID<br/></ifdef>}}}

                                {{{<ifdef code="ca_objects.description">
                                    <span class="trimText">^ca_objects.description</span>
                                </ifdef>}}}


                                {{{<ifdef code="ca_objects.dateSet.setDisplayValue"><H6>Date:</H6>^ca_objects.dateSet.setDisplayValue<br/></ifdev>}}}

                                    <hr></hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {{{<ifcount code="ca_entities" min="1" max="1"><H6>Related person</H6></ifcount>}}}
                                            {{{<ifcount code="ca_entities" min="2"><H6>Related people</H6></ifcount>}}}
                                            {{{<unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l></unit>}}}


                                            {{{<ifcount code="ca_places" min="1" max="1"><H6>Related place</H6></ifcount>}}}
                                            {{{<ifcount code="ca_places" min="2"><H6>Related places</H6></ifcount>}}}
                                            {{{<unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels.name</l></unit>}}}

                                            {{{<ifcount code="ca_list_items" min="1" max="1"><H6>Related Term</H6></ifcount>}}}
                                            {{{<ifcount code="ca_list_items" min="2"><H6>Related Terms</H6></ifcount>}}}
                                            {{{<unit relativeTo="ca_list_items" delimiter="<br/>">^ca_list_items.preferred_labels.name</unit>}}}

                                            {{{<ifcount code="ca_objects.LcshNames" min="1"><H6>LC Terms</H6></ifcount>}}}
                                            {{{<unit delimiter="<br/>">^ca_objects.LcshNames</unit>}}}
                                        </div><!-- end col -->
                                        <div class="col-sm-6 colBorderLeft">
                                            {{{map}}}
                                        </div>
                                    </div><!-- end row -->
                            </div>
                        </div>
                        <?php if($vs_xml_url): ?>
                            <div class="panel panel-default">
                                <div id="collapseA6" class="panel-collapse collapse" role="tabpanel">
                                    <pre><code class="html"><?php print htmlentities(file_get_contents($vs_xml_url)); ?></code></pre>
                                </div>
                            </div>
                            <script>$(document).ready(function() {
                                    $('pre').each(function(i, block) {
                                        hljs.highlightBlock(block);
                                    });
                                });</script>
                        <?php endif; ?>
                    </div>

                </div><!-- end col -->
                <div class='col-sm-6 col-md-6 col-lg-6 columnViewer rightColumn'>
                    <div class="viewerButtons">
                        <b>Visionneuse : </b>
                        <a role="button" data-toggle="collapse" data-parent="#collapsible2" href="#collapseB1" aria-expanded="true" aria-controls="collapseB1">
                            Media
                        </a>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible2" href="#collapseB2" aria-expanded="false" aria-controls="collapseB2">
                            Texte
                        </a>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible2" href="#collapseB3" aria-expanded="false" aria-controls="collapseB3">
                            Transcription
                        </a>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible2" href="#collapseB4" aria-expanded="false" aria-controls="collapseB4">
                            Métadonnées
                        </a>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible2" href="#collapseB5" aria-expanded="false" aria-controls="collapseB5">
                            Relations
                        </a>
                        <?php if($vs_xml_url): ?>
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapsible2" href="#collapseB6" aria-expanded="false" aria-controls="collapseB6">
                                XML
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="panel-group" id="collapsible2" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div id="collapseB1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                <div class="well">
                                    {{{representationViewer}}}

                                    <?php print caObjectRepresentationThumbnails($this->request, $this->getVar("representation_id"), $t_object, array("returnAs" => "bsCols", "linkTo" => "carousel", "bsColClasses" => "smallpadding col-sm-3 col-md-3 col-xs-4")); ?>

                                    <div id="detailTools">
                                        <div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span class="glyphicon glyphicon-comment"></span>Comments (<?php print sizeof($va_comments); ?>)</a></div><!-- end detailTool -->
                                        <div id='detailComments'>{{{itemComments}}}</div><!-- end itemComments -->
                                        <div class="detailTool"><span class="glyphicon glyphicon-share-alt"></span>{{{shareLink}}}</div><!-- end detailTool -->
                                    </div><!-- end detailTools -->
                                </div>


                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div id="collapseB2" class="panel-collapse collapse" role="tabpanel">
                                <iframe style="width:100%;height:650px;" src="/index.php/EuRED/TEIBoilerplate/Display/object/<?php print $t_object->get("object_id"); ?>/displayMode/text"></iframe>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div id="collapseB3" class="panel-collapse collapse" role="tabpanel">
                                <iframe style="width:100%;height:650px;" src="/index.php/EuRED/TEIBoilerplate/Display/object/<?php print $t_object->get("object_id"); ?>"></iframe>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div id="collapseB4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                <H4>{{{<unit relativeTo="ca_collections" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"> ➔ </ifcount>}}}{{{ca_objects.preferred_labels.name}}}</H4>
                                <H6>{{{<unit>^ca_objects.type_id</unit>}}}</H6>

                                {{{<ifdef code="ca_objects.measurementSet.measurements">^ca_objects.measurementSet.measurements (^ca_objects.measurementSet.measurementsType)</ifdef><ifdef code="ca_objects.measurementSet.measurements,ca_objects.measurementSet.measurements"> x </ifdef><ifdef code="ca_objects.measurementSet.measurements2">^ca_objects.measurementSet.measurements2 (^ca_objects.measurementSet.measurementsType2)</ifdef>}}}


                                {{{<ifdef code="ca_objects.idno"><H6>Identifer:</H6>^ca_objects.idno<br/></ifdef>}}}
                                {{{<ifdef code="ca_objects.containerID"><H6>Box/series:</H6>^ca_objects.containerID<br/></ifdef>}}}

                                {{{<ifdef code="ca_objects.description">
                                    <span class="trimText">^ca_objects.description</span>
                                </ifdef>}}}


                                {{{<ifdef code="ca_objects.dateSet.setDisplayValue"><H6>Date:</H6>^ca_objects.dateSet.setDisplayValue<br/></ifdev>}}}

                                    <hr></hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {{{<ifcount code="ca_entities" min="1" max="1"><H6>Related person</H6></ifcount>}}}
                                            {{{<ifcount code="ca_entities" min="2"><H6>Related people</H6></ifcount>}}}
                                            {{{<unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l></unit>}}}


                                            {{{<ifcount code="ca_places" min="1" max="1"><H6>Related place</H6></ifcount>}}}
                                            {{{<ifcount code="ca_places" min="2"><H6>Related places</H6></ifcount>}}}
                                            {{{<unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels.name</l></unit>}}}

                                            {{{<ifcount code="ca_list_items" min="1" max="1"><H6>Related Term</H6></ifcount>}}}
                                            {{{<ifcount code="ca_list_items" min="2"><H6>Related Terms</H6></ifcount>}}}
                                            {{{<unit relativeTo="ca_list_items" delimiter="<br/>">^ca_list_items.preferred_labels.name</unit>}}}

                                            {{{<ifcount code="ca_objects.LcshNames" min="1"><H6>LC Terms</H6></ifcount>}}}
                                            {{{<unit delimiter="<br/>">^ca_objects.LcshNames</unit>}}}
                                        </div><!-- end col -->
                                        <div class="col-sm-6 colBorderLeft">
                                            {{{map}}}
                                        </div>
                                    </div><!-- end row -->
                            </div>
                        </div>
                        <?php if($vs_xml_url): ?>
                            <div class="panel panel-default">
                                <div id="collapseB6" class="panel-collapse collapse" role="tabpanel">
                                    <pre><code class="html"><?php print htmlentities(file_get_contents($vs_xml_url)); ?></code></pre>
                                </div>
                            </div>
                            <script>$(document).ready(function() {
                                    $('pre').each(function(i, block) {
                                        hljs.highlightBlock(block);
                                    });
                                });</script>
                        <?php endif; ?>
                    </div>

                </div><!-- end col -->

            </div><!-- end row --></div><!-- end container -->
	</div><!-- end col -->

    <div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->



<script type='text/javascript'>
	jQuery(document).ready(function() {
		$('.trimText').readmore({
		  speed: 75,
		  maxHeight: 120
		});
	});
</script>