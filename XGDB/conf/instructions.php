<?php
session_start();
    $global_DB= 'xGDBvm';
    $PageTitle = 'Instructions';
    $pgdbmenu = 'Manage';
    $submenu1 = 'Config-Instructions';
    $submenu2 = 'Config-Instructions';
    $leftmenu='Config-Instructions';
    include('sitedef.php');
    include($XGDB_HEADER);
    include_once('/xGDBvm/XGDB/phplib/db.inc.php');

    ?>

                    <div id="leftcolumncontainer">
                        <div class="minicolumnleft">
                            <?php include_once("/xGDBvm/XGDB/conf/leftmenu.inc.php"); ?>
                        </div>
                    </div>
                    <div id="maincontentscontainer" class="twocolumn overflow configure">
                        <div id="maincontents"> 
                                <h1 class="configure bottommargin1"><img alt="" src="/XGDB/images/configure.png" /> Step-By-Step Instructions </h1>
                            <div class="feature">           
                                <p class="topmargin1 bottommargin2"><span class="instruction">Use this page as a guide to setting up, configuring, and creating your first GDB. For more details, go to <a class="help_style" href="/XGDB/help/create_gdb.php">Create/Manage Help</a></span></p>
                                    <ol class="orderedlist1 larger topmargin1">
                                        <li>Check your VM setup for completeness and capacity:
                                            <ul class="bullet1 indent1">
                                                <li>Check input and output <a title="Data Volumes" href="/XGDB/conf/volumes.php">Data Volumes</a> for <b>mount status</b> and <b>capacity</b> relative to your genome size</li>
                                                <li>Determine if you have the <b>right VM size</b> for your genome size and complexity: 
                                                    <ul class="bullet1 indent2">
                                                        <li>Review the xGDBvm wiki page <a href="http://goblinx.soic.indiana.edu/wiki/doku.php?id=my_genome_requirements">My Genome Requirements</a> for details and benchmarks.</li>
                                                        <li>A VM with more processors will decrease the analysis time for both spliced alignment and CpGAT gene prediction.</li>
                                                        <li>If warranted, request a larger VM (more processors), unmount and remount external devices to the new VM, configure and proceed.</li>
                                                        <li>For even more processing power with large evidence alignment datasets, use the High Performance Compute <b>(HPC)</b> option ('Manage'  &rarr; 'Remote Jobs').</li>
                                                    </ul>
                                                </li>
                                                <li>Make sure your <b>attached volume</b> is sufficient for to handle anticipated output data: 
                                                        <ul class="bullet1 indent2">
                                                            <li>Rule of thumb: allow at least <b>10x the aggregate size </b> of ALL your input data for ALL genome workflows to be run.</li>
                                                            <li>For example, you may want to run the same data twice or more, resulting in 2x the outputs.</li>
                                                            <li>Planning ahead could save you the effort of having to manually transfer your outputs to a new Volume!</li>
                                                        </ul>
                                                </li>
                                                <li>Install any <a title="License Keys" href="/XGDB/conf/licenses.php">License Keys</a> required for software you anticipate using on this VM</li>
                                            </ul>
                                        </li>
                                        <li>Run an Example dataset first:
                                            <ul class="bullet1 indent1">
                                                <li>Create a new GDB configuration with <i>'Manage'</i>  &rarr; <i>Config/Create</i> &rarr; <i>'<a href="/XGDB/conf/new.php/">Create New GDB</a>'</i>. This opens a form where you can specify input data sources and parameters.</li>
                                                <li>Instead of filling out the form, click the red 'Examples' button, and select an example dataset, e.g. <a href="/XGDB/conf/new.php?example=1">Example 1</a> or <a href="/XGDB/conf/new.php?example=1">Example 3</a>. These are 'toy' datasets designed to test pipeline functionality.</li>
                                                <li>Save your new GDB configuration. It will be assigned an ID (e.g. GDB001) and will show <span class="Development">Development</span> status. </li>
                                                <li>Before proceeding, click 'Data Process Options' &rarr; 'Validate Inputs' to validate input data files (valid files have a green checkmark, e.g. <span class="checked">filename</span>). Also, review  <span class="bold" style="color: orange">expected outputs</span> so you understand what the pipeline will be doing.</li>
                                                <li>Now click 'Data Process Options' &rarr; 'Create New GDB' to initiate the pipeline. The status will be <span class="Locked">Locked</span>. Monitor progress by refreshing the page or clicking to open the Logfile</li>
                                                <li>The processs should be completed in a few minutes and the status on refresh will change to <span class="Current">Current</span> (if not, click 'Data Process Options' &rarr; 'Abort' to kill the job).</li>
                                                <li>Review the outputs under 'General Information': 'Features', where each track feature  (EST, Protein, Gene Models) is enumerated. Also note any errors flagged. </li>
                                                <li>If the outputs are not as expected, your VM may not be configured correctly. Review  <a href="XGDB/conf/volumes.php">mount status</a>, and check the <a href="http://goblinx.soic.indiana.edu/wiki/doku.php?id=troubleshooting">Troubleshooting</a> section of the Wiki.</li>
                                                <li>If your example completed successfully, click 'GDB Home' or 'GDB Region' to open the Genome Browser and make sure the data are displayed successfully. If no data are displayed, it may be a sign the VM is not configured correctly.</li>
                                                <li>Run additional example datasets as desired. You can <b>Drop</b> a GDB (remove outputs but retain configuration) or <b>Delete</b> a GDB (remove outputs & configuration, reset the counter) from the <a href="/XGDB/conf/archive.php">Archive/Delete</a> page.</li>
                                                <li>If you anticipate using high performance computing (HPC) resources to speed your data processing, complete the above steps first and then visit <a href="/XGDB/jobs/index.php">Remote Jobs</a> for details on how to configure and test the Remote HPC option</li>
                                                <li>One you are satisfied your VM is functioning correctly, proceed to the steps below to prepare and process your own data on xGDBvm</li>
                                            </ul>
                                        </li>
                                       <li>Using your own data: goals and requirements (see also <a href="http://goblinx.soic.indiana.edu/wiki/doku.php?id=my_genome_requirements">My Genome Requirements</a>): 
                                            <ul class="bullet1 indent1">
                                                <li><b>Genome size/complexity:</b> 
                                                    <ul class="bullet1">
                                                        <li>"Toy" dataset only <span class="heading"> <a class="help_style" href="/XGDB/help/remote_jobs.php">HPC</a> not required (except for testing)</span></li>
                                                        <li>Single or few scaffolds up to 100 MB <span class="heading">- external volume mount recommended; <a class="help_style" href="/XGDB/help/remote_jobs.php">HPC</a> optional</span> </li>
                                                        <li>Whole assembled genome (superscaffolds + scaffolds) up to 500 MB  <span class="heading">- external volume mount recommended; <a class="help_style" href="/XGDB/help/remote_jobs.php">HPC</a>recommended</span></li>
                                                        <li>See <a href="/case-studies/Polistes/README.md">Polistes</a> and <a href="/case-studies/Volvox/README.md">Volvox</a> case studies for some advanced genome analysis examples</li>
                                                    </ul>
                                                </li>
                                                <li><b>Repeat masking?</b>
                                                    <ul class="bullet1"> 
                                                     <li>Very compact genome <span class="heading">-- may not need repeat masking</span></li>
                                                     <li>Genome already masked using 'N' <span class="heading">-- use hardmasked sequence'as is' for transcript spliced alignment </li>
                                                     <li>Genome already masked using 'X' or lowercase <span class="heading">-- convert to 'N' masked for transcript spliced alignment </li>
                                                     <li>Genome large, not masked <span class="heading">-- provide a repeat mask library file and use 'Repeat Mask' option for GeneSeqer</span> </li>
                                                    </ul>
                                                </li>
                                                <li><b>Spliced-alignment to genome:</b> 
                                                    <ul class="bullet1">
                                                        <li> EST, cDNA or TSA inputs e.g. a short-read assembly from this species - <span class="heading">-- GeneSeqer process; choose species model</span> -</li>
                                                        <li> Protein  e.g. from a closely-related species <span class="heading">-- GenomeThreader process; choose species model</span></li>
                                                        <li> Large datasets <span class="heading">-- select the <a href="/XGDB/help/remote_jobs.php">HPC</a> option </span></li>
                                                    </ul>
                                                </li>
                                                <li><b>Gene Prediction:</b>
                                                    <ul class="bullet1">
                                                        <li>Existing annotation available? <span class="heading">-- provide a .gff3 table to upload</span></li>
                                                        <li>Annotate selected genome region?  <span class="heading">-- this can be done from genome browser using the <a href="/XGDB/help/cpgat.php#cpgat_tool_overview">CpGAT region tool</a> </span>;</li>
                                                        <li>Annotate full genome?  <span class="heading">Select <a href="/XGDB/help/cpgat.php">CpGAT</a> option;</li>
                                                    </ul>
                                                </li>
                                                <li><b>Reference Proteins</b> (default CEGMA core set, or larger, user-supplied dataset for a given taxonomic group, e.g. <a href="http://goblinx.soic.indiana.edu/wiki/doku.php?id=uniref">UniRef90</a>)
                                                    <ul class="bullet1">
                                                        <li>High confidence (filtered) annotation desired? <span class="heading"> - Include RefProt dataset for CpGAT</span> <span class="warning">NOTE: this will increase processing time significantly</span></span></li>
                                                        <li>Lower quality (Unfiltered) annotation desired? <span class="heading"> - use 'Skip Blast' option for CpGAT</span> (analysis will be faster) </li>
                                                    </ul>
                                                </li>
                                                <li><b>Total input data size:</b> Add up megabytes of all inputs above to estimate storage needs (see below)</li>
                                            </ul>
                                        </li>
                                        <li>Prepare your data:
                                            <ul class="bullet1 indent1">
                                                <li>Click <a title="Input data requirements" href="/XGDB/conf/sources.php">Data Sources</a> to review data source requirements</li>
                                                <li>Prepare your input data with standardized filenames according to <a title="Input data requirements" href="/XGDB/conf/data.php">Data Requirements</a> ((e.g. <span class="plaintext">~tsa.fa</span>, <span class="plaintext">~gdna.rm.fa</span>) </li>
                                                <li>Deposit files in a <b>named directory</b> on your <a href="http://data.iplantcollaborative.org">Data Store</a> (if mounted) under <span class="plaintext"> /home/[username]/xgdbvm/</span> or on the VM under <span class="plaintext">/xGDBvm/input/xgdbvm/</span></li>
                                            </ul>
                                        </li>
                                        <li>Configure a new GDB:
                                            <ul class="bullet1 indent1">
                                                <li>Click <a title="configure new GDB" href="/XGDB/conf/new.php" >Configure New GDB</a> and enter a name and path to input data </li>
                                                <li>For large datasets, select the 'Remote' option (additional configuration required; see <a title="Remote HPC Computing Config" href="/XGDB/jobs/index.php">Remote Jobs (HPC)</a> for details). </li>
                                                <li>Click 'Save' to store the configuration. Your new GDB will have <span class="Development">Development</span> status.</li>
                                            </ul>
                                        </li>
                                        <li>Check your GDB configuration:
                                            <ul class="bullet1 indent1">
                                                <li>Click dropdowns to verify <span class="checked">valid filenames</span> and <span class="bold" style="color: orange">expected outputs</span> in your saved GDB configuration.</li>
                                                <li>Validate your data (sequence counts, size distribution, ID type) using the 'Data Process Options' &rarr; 'Validate' function on the GDB Config page, and correct any problems flagged. This is a critical step that will save you headaches down the road.</li>
                                                <li>You can also click the <img src="/XGDB/images/information.png" alt="" /> icon by each filename to check contents or re-validate that file</li>
                                                <li>If using HPC resources, note especially the scaffold size distribution of your <span class="plaintext"> ~gdna.fa</span> (genome) file in the <img src="/XGDB/images/information.png" alt="" /> readout.</li>
                                            </ul>
                                        </li>
                                        <li>High Performance Computing (HPC) Resource:
                                            <ul class="bullet1 indent1">
                                                <li>To splice-align transcripts or proteins to <b>full genome assemblies</b> (100's to 1000's of MB) you will need to use xGDBvm's links to <a title="Remote HPC Computing Standalone" href="/XGDB/jobs/index.php">HPC</a> resources.</li>
                                                <li>Work through the HPC <a title="HPC Instructions" href="/XGDB/jobs/index.php">Getting Started</a> instructions to make sure your VM is correctly configured for submitting remote HPC jobs</li>
                                                <li>Review <a title="High Performance Compute Resource Benchmarks" href="/XGDB/jobs/resources.php">HPC Resources</a> to estimate processor requirements for your genome, especially the projected split count.</li>
                                                <li>We recommend using the <a title="Remote HPC Computing Standalone" href="/XGDB/jobs/configure.php">Standalone</a> job submission tool first. If outputs are acceptable, you can copy the output file to your data input directory where the pipeline can parse and upload the alignments. </li>
                                                <li>Once familiar with your data type and HPC outcome, one or more HPC processes can be integrated into the GDB pipeline using the 'Remote HPC' configuration option.</li>
                                            </ul>
                                        </li>
                                        <li>Initiate the pipeline:
                                            <ul class="bullet1 indent1">
                                                <li>Click <i>Data Process</i> &rarr; <i>Create New</i> on the GDB configuration page. GDB will be <span class="Locked">Locked</span> while pipeline is running</li>
                                                <li>Monitor pipeline progress using the Pipeline Log (click the <img src="/XGDB/images/magnifier.png" alt="" /> icon)</li>
                                                <li>Monitor Remote HPC progress from the <a title="Remote HPC Computing Jobs List" href="/XGDB/jobs/jobs.php">Jobs</a> page.</li>
                                                <li>When complete, your new GDB will be viewable as a  <a title="configure new GDB" href="/XGDB/index.php" >Current Genome Browser</a></li>
                                                <li>The GDB configuration status is now <span class="Current">Current</span>. You can edit the configuration as desired (add a default region, metadata, etc.)</li>
                                            </ul>
                                        </li>
                                        <li>Manage your GDB:
                                            <ul class="bullet1 indent1">
                                                <li>Use the <span class="Update">Update</span> feature to add or replace existing data (genome segments, evidence alignments, CpGAT annotation, etc.)</li>
                                                <li>You can <b>Drop</b>, <b>Delete</b>, or <b>Archive</b> your GDB ('Manage' &rarr; Configure/Create' &rarr; '<a href="/XGDB/conf/archive.php">Archive/Delete</a>'). An archive can be copied to your Data Store and shared with others for viewing on their own VM</li>
                                                <li>If you want to make your genome data <b>public</b>, change the password management to 'Admin Protection' (public can view but not alter data): 'Admin' &rarr; '<a href="/admin/setup.php">Setup Passwords</a>'</li>
                                                <li>To re-annotate questionable gene structures, use the <b>yrGATE tool</b> available in Genome Context View, or re-annotate a region with different parameters using the <b>CpGAT Region</b> tool. </li>
                                                <li>You can start a <b>community annotation</b> project by allowing users to create yrGATE accounts on your VM ('Annotate' &rarr; '<a href="/src/yrGATE/index.php">Getting Started</a>'). Assign one or more Admin accounts ('Manage'&rarr;'Admin'&rarr;'Manage Users') to curate submissions.</li>

                                            </ul>
                                        </li>
                                        <li><b>Case Studies</b>
                                            <ul class="bullet1 indent1">
                                                <li>You may want to review the following <b>case studies</b> for examples of how to set and use xGDBvm for genome analysis</li> 
                                                <li><a href="/case-studies/Volvox/README.md">Volvox</a> - annotating a green algal genome using <i>Chlamydomonas</i> data.</li>
                                                <li><a href="/case-studies/Polistes/README.md">Polistes</a> - wasp genome annotation using related species data</li>
                                            </ul>
                                        </li>
                                        <li><b>Further Resources</b>
                                            <ul class="bullet1 indent1">
                                            	<li>xGDBvm <a href="/XGDB/help/index.php">Help Pages</a> (including links to video tutorials)</li>
                                                <li>xGDBvm <a href="https://github.com/BrendelGroup/xGDBvm/tree/master/case-studies"case studies">Case Studies</a> - real-world examples employing xGDBvm for genome analysis</li> 
												<li>Wikis: <a href="https://pods.iplantcollaborative.org/wiki/dashboard.action">CyVerse Wiki</a>,<a href="http://goblinx.soic.indiana.edu/wiki/doku.php">xGDBvm wiki</a></li>
                                            </ul>
                                        </li>
                                    </ol>
                                </div>
                            </div><!--end maincontents-->
                          <div style="clear:both; float:right">
                            <a href="http://validator.w3.org/check?uri=referer"><img
                              src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="15" width="44" /></a>
                          </div>                        
                    </div><!--end maincontentsfull-->
                </div><!--end maincontentscontainer-->
                <?php include($XGDB_FOOTER); ?>
            </div><!--end innercontainer-->
        </div><!--end outercontainer-->
    </body>
</html>