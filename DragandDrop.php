<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
  <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <style type="text/css">
  .elements 
  {
    margin: 3px;
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 6px;
    background: #777;
    position: relative;
    width: 58%;
  }

  .elements div.element 
  {
    display: inline-block;
    padding: 6px;
    padding-right: 10px;
    margin: 0;
  }

  .side-handle 
  {
    display: inline-block;
    width: 10px;
    height: 20px;
    margin-bottom: -5px;
    cursor: grab;
  }

  .top-handle 
  {
    position: absolute;
    top: 0;
    left: 10%;
    margin-left: -8px;
    cursor: grab;
  }

  .top-delete 
  {
    position: absolute;
    top: 0;
    left: 100%;
    margin-left: -16px;
    cursor: pointer;
  }

  #drop 
  {
    width: 58%;
    height: 340px;
    background-color: #ccc;
    border: 1px solid #aaa;
    border-radius: 12px;
    margin: 3px;
  }

  #drop div.element 
  {
    display: block;
    padding: 3px;
    padding-top: 16px;
    margin: 0;
  }

  #drop div.element input,
  {
    width: 100%;
    height: 100%;
  }

</style>
</head>

<div class="elements">
  <div class="new textbox-wrapper element ui-widget-content ui-corner-all" data-item-type="input[type='text']" id="">
    <input type="text" class="" title="" placeholder="New Textbox" />
  </div> 
</div>
<div id="drop"></div>

<script type="text/javascript">
  
  $(document).ready(function() 
  {
    $('.new').draggable({
      helper: "clone",
      revert: "invalid"      
    });
    $('#drop').droppable({
      accept: ".new",
      drop: function(e, u) 
      {
        var a = u.helper.clone();

        a.appendTo("#drop");
        
        a.removeClass("new");
        a.find(".side-handle").remove();
        
        var handle, remv;
        handle = $("<span>", {
          title: "Double-click to resize",
          class: "top-handle ui-icon ui-icon-grip-dotted-horizontal"
        });

        remv = $("<span>", {
          title: "Click to Delete",
          class: "top-delete ui-icon ui-icon-close"
        })
        .click(function() 
        {
          $(this).parent().remove();
        });
        a.append(handle, remv);
        a.addClass('dropped').draggable({
          containment: "#drop"
        }).dblclick(function() 
        {

          var thisElement = $(this).data("item-type");
          $(this).resizable({
            alsoResize: ".dropped " + thisElement
          });
        });
      }
    });

  });

</script>