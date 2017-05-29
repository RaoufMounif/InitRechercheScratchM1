@extends('layouts.app')

@section('content')



    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6" style="margin-outside: 0%">
                        <legend for="comment" style="color: green;  margin: 1%;">Jouez Votre Vidéo</legend>
                        <button id="load" onclick="start()" class="btn btn-primary btn-lg btn-block">Charger</button>
                        <div id="projectButtons" class="row">
                            <div class="col-md-6">
                                <button id="greenflag" class="btn btn-success btn-lg btn-block" style="visibility: hidden">Commencer </button>
                            </div>

                            <div class="col-md-6">
                                <button id="stopall" class="btn btn-danger  btn-lg btn-block" style="visibility: hidden">Arrêter </button>
                            </div>
                        </div>



                        <div id="tab-renderexplorer"  class="form-group">

                            <canvas id="scratch-stage"  class="form-group"></canvas>


                        </div>

                    </div>

                    <div class="col-md-6">

                        <form method="POST" action="/video/{{$video->id}}/comments" class="form-horizontal">
                            {{csrf_field()}}
                            <fieldset>
                                <!-- Form Name -->
                                <legend for="comment" style="color: green">Commenter ICI :)</legend>

                                <!-- Textarea -->
                                <div class="form-group">


                                    <textarea class="form-control" rows="20" id="comment" name="commentText" placeholder="Votre Commentaire ICI ..."></textarea>

                                </div>

                                <!-- Button -->
                                <div class="form-group">


                                    <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-success btn-lg btn-block">Ajouter commentaire</button>

                                </div>

                            </fieldset>
                        </form>



                        {{--useless but important for scratch-vm--}}
                        <div class="useless" style= "position: absolute;left: 100px; top: 150px;">

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
                                <button id="projectLoadButton">load</button>
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
                            <textarea id="demo" cols="50" style="visibility: hidden">{{$video->xml}}</textarea>
                        </div>
                    </div>




                    <!-- FPS counter, Syntax highlighter, Blocks, Renderer -->
                    <script src="js/vendor.js"></script>
                    <!-- VM Worker -->
                    <script src="js/scratch-vm.js"></script>
                    <!-- Playground -->
                    <script src="js/playground.js"></script>


                    <script>
                        function start() {

                            var input = document.getElementById('demo');
                            var xml = Blockly.Xml.textToDom(input.value);
                            Blockly.Xml.domToWorkspace(workspace, xml);

                            var start = document.getElementById('greenflag');
                            var stop = document.getElementById('stopall');
                            var load = document.getElementById('load');

                            start.style.visibility="visible";
                            stop.style.visibility="visible";
                            load.disabled = true;

                        }
                    </script>


@endsection

