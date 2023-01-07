<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/united/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/styles/shCoreDefault.min.css" /> -->
<link rel="stylesheet" href="../dist/css/default/zebra_datepicker.min.css" type="text/css">
<!-- <link rel="stylesheet" href="examples.css" type="text/css"> -->

<h3><strong>15.</strong> Always-visible date pickers</h3>

<p>
    Set the <code>always_visible</code> property's value to a jQuery element which will act as a
    container for the date picker.<br>Notice that in this case the element the date picker is attached
    to has no icon.
</p>

<pre class="brush:js">
$('#datepicker').Zebra_DatePicker({
    always_visible: $('#container')
});
</pre>

<div id="container" style="margin: 10px 0 15px 0; height: 255px; position: relative"></div>

<div class="well">
    <div class="row">
        <div class="col-sm-3">
            <input id="datepicker-always-visible" type="text" class="form-control" data-zdp_readonly_element="false">
        </div>
    </div>
</div>

<a name="rtl-support"></a>
<div class="top">
    <a href="#top" class="small">⯅ To the top</a>
</div>



<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/zebra_pin@2.0.0/dist/zebra_pin.min.js"></script> -->
<script src="../dist/zebra_datepicker.min.js"></script>
<script src="examples.js"></script>

<script>
        $(document).ready(function(){
                $('#datepicker').Zebra_DatePicker({
    always_visible: $('#container')
}); 
        })
</script>