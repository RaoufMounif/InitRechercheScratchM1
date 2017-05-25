@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <h1>Faites votre vidéo dans QQS clics.</h1><br/>
                <div id="projectButtons" class=" row">
                    <div class="col-md-6">
                        <button id="greenflag" class="btn btn-success btn-lg">Commencer</button>
                    </div>
                    <div class="col-md-6">
                        <button id="stopall" class="btn btn-danger  btn-lg">Arrêter</button>
                    </div>
                    <hr>
                </div>
                <div id="tab-renderexplorer">
                    <br/>
                    <canvas id="scratch-stage" style="width: 480px; height: 360px;"></canvas>
                    <br/>
                    <hr>
                    <!-- ///////////////////////////////////////////////////////////// -->
                    <div class="row ">
                        <div class="col-md-6 ">
                            <button id="refresh" onclick="refresh();" class="btn btn-primary btn-lg">Reset</button>
                        </div>
                        <div class="col-md-6 ">




                            <button id="finish"  onclick="toXml()" class="btn btn-danger btn-lg">Finish</button>
                            <form id="xmlSubmit" method="POST" action="/video" style="visibility: hidden">
                                {{csrf_field()}}
                                <textarea name="xmlVideo" id="xmlVideo" cols="30" rows="10"></textarea>
                                <textarea name="parsedXmlVideo" id="parsedXmlVideo" cols="30" rows="10"></textarea>


                                <input type="submit">

                            </form>
                        </div>

                    </div>
                </div>



            </div>

            <div id="blocks" class="col-md-6">


            </div>


        </div>
    </div>
    <!-- FPS counter, Syntax highlighter, Blocks, Renderer -->
    <script src="js/vendor.js"></script>
    <!-- VM Worker -->
    <script src="js/scratch-vm.js"></script>
    <!-- Playground -->
    <script src="js/playground.js"></script>

    <script>
        function toXml() {
            var output = document.getElementById('importExport');
            var xml = Blockly.Xml.workspaceToDom(workspace);

            output.value = Blockly.Xml.domToPrettyText(xml);
            alert(output.value);

            var htmlOutput= document.getElementById('xmlVideo');
            htmlOutput.innerHTML= output.value;




            xmlForm=document.getElementById('xmlSubmit');

            xmlForm.submit();



//            var data = new FormData();
//            data.append("data", output.value);
//
//            var xhr = new XMLHttpRequest();
//            //var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
//            xhr.open('post', 'api/saveXml.php', true);
//            xhr.send(data);
            //                                output.focus();
            //                                output.select();

            //////////////////////////////////////
            /* var lastFileName = document.getElementById('fileName');
             //alert(lastFileName.value);

             if (lastFileName.value !== null) {
             var data = new FormData();
             data.append("data", output.value);
             data.append("lastFileName", lastFileName.value);
             var xhr = new XMLHttpRequest();
             //var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
             xhr.open('post', 'api/saveXml.php', true);
             xhr.send(data);

             window.location.replace("commentsSite/index.php");
             //refresh();
             ///////////////////////////////////////////
             } else {//this is for the first file
             var data = new FormData();
             data.append("data", output.value);
             data.append("lastFileName", "0");
             var xhr = new XMLHttpRequest();
             //var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
             xhr.open('post', 'api/saveXml.php', true);
             xhr.send(data);
             //window.location.replace("commentsSite/index.php");
             }*/
        }

        function fromXml() {
            var input = document.getElementById('importExport');
            var xml = Blockly.Xml.textToDom(input.value);
            Blockly.Xml.domToWorkspace(workspace, xml);
        }
        /////////////////////
        function refresh() {
            location.reload();

        }
        /////////////////
    </script>


    <!--     ---------------------------------------------   -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>



    <script src="js/main.js"></script>

    <select id="selectedTarget" multiple style="visibility: hidden;"></select>

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
    <div id="tab-threadexplorer">
        Thread explorer
        <pre id="threadexplorer"></pre>
    </div>
    <div id="tab-blockexplorer">
        Block explorer
        <pre id="blockexplorer"></pre>
    </div>
@endsection
