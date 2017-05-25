
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">
        <meta name="author" content="">
        <title>Comment site</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">

        <!-- Temporary fix for navbar responsiveness -->

        <link rel="stylesheet" href="../../../../public/css/playground.css">
        <link rel="stylesheet" href="../../../../public/css/zenburn.css">
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"> Université de Lorraine </a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <label id="project_Id" style="color: green;"><strong>Vidéos liste</strong> </label>
                    <?php
                    echo '<select id="selectProject" class="form-control" name="select">';
                    $fileName = "";
                    $d = dir("../saved_projects");
                    while (false !== ($entry = $d->read())) {
                        $fileName = $entry;
                        $fileNameArray = explode(".", $fileName);
                        $fileName = $fileNameArray[0];
                        $fileName = intval($fileName);
                        if ($fileName !== 0) {
                            echo '<option value="' . $fileName . '" >'
                            . $fileName
                            . '</option>';
                        }
                    }
                    $d->close();
                    echo '</select>';
                    ?>
                    <br/>

                    <div id="projectButtons" class="row">

                        <div class="col-md-6">
                            <button id="greenflag" class="btn btn-success btn-lg">Start</button>
                        </div>
                        <div class="col-md-6">
                            <button id="stopall" class="btn btn-danger  btn-lg">Stop</button>
                        </div>

                        <br/>
                        <hr>
                    </div>
                    <div id="tab-renderexplorer">

                        <canvas id="scratch-stage" style="width: 480px; height: 360px;"></canvas>
                        <br/>
                        <!-- ///////////////////////////////////////////////////////////// -->
                        <hr>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button id="refresh" onclick="refresh();" class="btn btn-primary btn-lg">Reset</button>
                        </div>
                        <div class="col-md-6">
                            <button id="finish" onclick="toJSON()" class="btn btn-danger btn-lg">Finish</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <label for="comment" style="color: green">Put your Comment Here:</label>
                    <textarea class="form-control" rows="20" id="comment"></textarea>
                    <div class="btn-group-justified">
                        <div class="col-md-1 ">
                            <button id="Submit" onclick="postComment();" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </div>

                </div>
            </div>
            <select id="selectedTarget" multiple style="visibility: visible;"></select>
            <div style="visibility: hidden;">
                <input id='turbomode' type='checkbox'/>
            </div>
            <div style="visibility: hidden;">
                <input id='compatmode' type='checkbox'/>
            </div>
            <br/>
            <ul id="playgroundLinks" style="visibility: hidden;">
                <li><a id="renderexplorer-link" href="#"></a></li>
                <li><a id="threadexplorer-link" href="#" style="visibility: hidden;">Threads</a></li>
                <li><a id="blockexplorer-link" href="#" style="visibility: hidden;">Block Representation</a></li>
                <li><a id="importexport-link" href="#" style="visibility: hidden;">Import/Export</a></li>
            </ul>

            <!-- ///////////////////////////////////////////////////////////// -->
            <input id='sinfo-x' style="visibility: hidden;"/>
            <input id='sinfo-y' style="visibility: hidden;"/><br/>
            <input id='sinfo-direction' style="visibility: hidden;"/>
            <input id='sinfo-rotationstyle' style="visibility: hidden;"/><br/>
            <input id='sinfo-visible' style="visibility: hidden;"/>
            <button id='sinfo-post' style="visibility: hidden;">Post</button>

            <div id="tab-threadexplorer">
                Thread explorer
                <pre id="threadexplorer"></pre>
            </div>
            <div id="tab-blockexplorer">
                Block explorer
                <pre id="blockexplorer"></pre>
            </div>
            <div id="tab-importexport">
                Import/Export<br/>
                Project ID: <input id="projectId" value="119615668"/>
                <button id="projectLoadButton">Load</button>
                <button id="createEmptyProject">New Project</button>
                <br/>
                <p>
                    <input type="button" value="Export to XML" onclick="toXml()">
                    &nbsp;
                    <input type="button" value="Import from XML" onclick="fromXml()" id="import">
                    <br/><br/>
                    <textarea id="importExport"></textarea>
                </p>
            </div>


            <div id="blocks" style="visibility: hidden"></div>
            <textarea id="demo"></textarea>
        </div>

        <!-- FPS counter, Syntax highlighter, Blocks, Renderer -->
        <script src="vendor.js"></script>
        <!-- VM Worker -->
        <script src="scratch-vm.js"></script>
        <!-- Playground -->
        <script src="playground.js"></script>

        <script>
                        var activities = document.getElementById("selectProject");
                        activities.addEventListener("change", function () {
                            filename = this.value;
                            loadMyproject(filename);
                        });

        </script>
        <script>


            function fromXml() {
                var input = document.getElementById('demo');
                var xml = Blockly.Xml.textToDom(input.value);
                Blockly.Xml.domToWorkspace(workspace, xml);
            }
            /////////////////////
            function refresh() {

                //location.reload();

            }
            function changeFunc() {
                var selectBox = document.getElementById("selectProject");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                alert(selectedValue);
            }
            function postComment() {
                var comment = document.getElementById("comment").value;
                alert(comment);
                var data = new FormData();
                data.append("data", comment);   

                var xhr = new XMLHttpRequest();
                //var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
                xhr.open('post', 'addComment.php', true);
                xhr.send(data);
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        alert(this.responseText);

                    }
                };
                
             
            }
            /////////////////

            function loadMyproject(filename) {
                alert("hi" + filename);

                var data = new FormData();
                data.append("data", filename);

                var xhr = new XMLHttpRequest();
                //var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
                xhr.open('post', 'getXml.php', true);
                xhr.send(data);
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        alert(this.responseText);
                        document.getElementById("demo").innerHTML =
                                this.responseText;

                        var xml = Blockly.Xml.textToDom(this.responseText);
                        Blockly.Xml.domToWorkspace(workspace, xml);



                    }
                };

                var data = new FormData();
                data.append("data", filename);

                var xhr = new XMLHttpRequest();
                //var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
                xhr.open('post', 'ParseXML.php', true);
                xhr.send(data);
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        alert(this.responseText);

                    }
                };

            }


        </script>



    <!-- ////////////////////////////////////////////////////////////////////////// -->

    <!-- /.col-lg-8 -->


    <!-- /.col-md-4 -->


    <!-- /.row -->


    <!-- /.container -->

    <!-- Footer -->

    <!-- jQuery Version 3.1.1 -->
    <script src="js/jquery.js"></script>

    <!-- Tether -->
    <script src="js/tether.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
