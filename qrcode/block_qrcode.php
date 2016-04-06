<?php
class block_qrcode extends block_base {
    public function init() {
        $this->title = get_string('simpleqr', 'block_qrcode');
    }
	public function get_content() {
    if ($this->content !== null) {
      return $this->content;
    }
	global $COURSE, $CFG;
    $this->content         =  new stdClass;
	$this->content->text = '
		<div id="qrcode" style="margin: 0px auto;"></div>
		<script>
			function openwindow (url) {
				newwindow = window.open(url, "QR Code", "width=250,height=250,status=yes,scrollbars=yes,resizable=yes");
				newwindow.focus();
			}
			function qr() {
				var namedElements = document.getElementById("qrcode");
				var thisURL = "' . $CFG->wwwroot  . '/course/view.php?id=' . $COURSE->id . '";
				namedElements.innerHTML = "<a href=\'https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chld=L|0&chs=250x250&chl=" + thisURL + "\' onclick=\'openwindow(this.href); return false;\' /><img class=\'img-responsive\' alt=\'QR Code to this page\' src=\'https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chld=L|0&chs=250x250&chl=" + thisURL + "\' /></a>";
		}
			window.onload = qr;
		</script>';
 
    return $this->content;
  }
} 