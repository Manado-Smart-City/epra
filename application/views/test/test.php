<button>Send an HTTP GET request to a page and get the result back</button>

<div class="wrapper">
Category : <select name="parent_selection" id="parent_selection">
    <option value="">-- Silahkan pilih --</option>
    <option value="Barang">Barang</option>
    <option value="Konstruksi">Konstruksi</option>
    <option value="Konsultan">Konsultan</option>
    <option value="Lainnya">Lainnya</option>
</select>
<select name="child_selection" id="child_selection">
</select>
</div>

<br><br>
<div class="box-footer text-black">
  <div class="row">
    <div class="col-sm-6">

      <!-- Progress bars -->
      <div class="clearfix">
        <span class="pull-left" style="font-size: 20px;">Januari</span>
        <small class="pull-right">
        	<div class="input-group">
        		<input type="text" name="tk_1" value="10.5%" class="form-control floating" id="tk_1" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
        		<span class="input-group-addon">%</span>
        	</div>
      </div>
      <div class="progress xs" style="margin-top: 10px;">
        <div id="pbf_1" class="progress-bar progress-bar-green" style="width: 10.5%;"></div>
      </div>

      <!-- Progress bars -->
      <div class="clearfix">
        <span class="pull-left" style="font-size: 20px;">Februari</span>
        <small class="pull-right">
        	<div class="input-group">
        		<input type="text" name="tk_2" value="10.5%" class="form-control floating" id="tk_2" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
        		<span class="input-group-addon">%</span>
        	</div>
      </div>
      <div class="progress xs" style="margin-top: 10px;">
        <div id="pbf_2" class="progress-bar progress-bar-green" style="width: 10.5%;"></div>
      </div>

      <!-- Progress bars -->
      <div class="clearfix">
        <span class="pull-left" style="font-size: 20px;">Maret</span>
        <small class="pull-right">
        	<div class="input-group">
        		<input type="text" name="tk_3" value="10.5%" class="form-control floating" id="tk_3" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
        		<span class="input-group-addon">%</span>
        	</div>
      </div>
      <div class="progress xs" style="margin-top: 10px;">
        <div id="pbf_3" class="progress-bar progress-bar-green" style="width: 10.5%;"></div>
      </div>

      <!-- Progress bars -->
      <div class="clearfix">
        <span class="pull-left" style="font-size: 20px;">April</span>
        <small class="pull-right">
        	<div class="input-group">
        		<input type="text" name="tk_4" value="10.5%" class="form-control floating" id="tk_4" style="text-align: right; width: 100px;" onfocusout="updateProgressBar(this.id)" /></small>
        		<span class="input-group-addon">%</span>
        	</div>
      </div>
      <div class="progress xs" style="margin-top: 10px;">
        <div id="pbf_4" class="progress-bar progress-bar-green" style="width: 10.5%;"></div>
      </div>            



    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
</div><!-- /.box -->
<script>
function updateProgressBar(z) {
    var x = document.getElementById(z).value;
    var y = x.concat("%");
    switch (z) {
    	case "tk_1": document.getElementById("pbf_1").style.width = y; break;
    	case "tk_2": document.getElementById("pbf_2").style.width = y; break;
    	case "tk_3": document.getElementById("pbf_3").style.width = y; break;
    	case "tk_4": document.getElementById("pbf_4").style.width = y; break;
    	case "tk_5": document.getElementById("pbf_5").style.width = y; break;
    	case "tk_6": document.getElementById("pbf_6").style.width = y; break;
    	case "tk_7": document.getElementById("pbf_7").style.width = y; break;
    	case "tk_8": document.getElementById("pbf_8").style.width = y; break;
    	case "tk_9": document.getElementById("pbf_9").style.width = y; break;
    	case "tk_10": document.getElementById("pbf_10").style.width = y; break;
    	case "tk_11": document.getElementById("pbf_11").style.width = y; break;
    	case "tk_12": document.getElementById("pbf_12").style.width = y; break;
    }
    //document.getElementById().value = 100;
    //document.getElementById("pbf_1").style.width = y;
}
</script>