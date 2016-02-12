
</div></div></div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

      




    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/chartjs/chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/icheck/icheck.min.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/moment.min2.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/datepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/sparkline/jquery.sparkline.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/custom.js"></script>

    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/jquery.flot.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/jquery.flot.pie.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/jquery.flot.orderBars.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/jquery.flot.time.min.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/date.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/jquery.flot.spline.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/jquery.flot.stack.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/curvedLines.js"></script>
    <script type="<?php echo base_url();?>text/javascript" src="assets/js/flot/jquery.flot.resize.js"></script>

        <script src="<?php echo base_url();?>assets/js/tags/jquery.tagsinput.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/switchery/switchery.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/editor/bootstrap-wysiwyg.js"></script>
        <script src="<?php echo base_url();?>assets/js/editor/external/jquery.hotkeys.js"></script>
        <script src="<?php echo base_url();?>assets/js/editor/external/google-code-prettify/prettify.js"></script>
        <script src="<?php echo base_url();?>assets/js/select/select2.full.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/parsley/parsley.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/textarea/autosize.min.js"></script>
        <script>
            autosize($('.resizable_textarea'));
        </script>

            <script type="text/javascript" src="<?php echo base_url();?>assets/js/wizard/jquery.smartWizard.js"></script>
    
        

        <!-- ini buat nampilin data table -->
        <script src="<?php echo base_url();?>assets/js/datatables/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url();?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>



            <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Cari Data:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url('assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>
</body>

</html>