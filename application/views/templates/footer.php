      </div><!-- /.container-fluid -->
      </section><!-- /.content -->
      </div>

      <!-- /.content-wrapper -->
      <footer class="main-footer float-right">
        <strong>Copyright &copy; 2021 CV. DERWATI Pontianak</a>.</strong>
        All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
      <!-- select2 -->
      <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
      <!-- fullCalendar 2.2.5 -->
      <script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/fullcalendar/main.js"></script>
      <!-- Page specific script -->
      <script>
        $(function() {

          /* initialize the external events
          -----------------------------------------------------------------*/
          function ini_events(ele) {
            ele.each(function() {

              // create an Event Object (https://fullcalendar.io/docs/event-object)
              // it doesn't need to have a start or end
              var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
              }

              // store the Event Object in the DOM element so we can get to it later
              $(this).data('eventObject', eventObject)

              // make the event draggable using jQuery UI
              $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
              })

            })
          }

          ini_events($('#external-events div.external-event'))

          /* initialize the calendar
          -----------------------------------------------------------------*/
          //Date for the calendar events (dummy data)
          var date = new Date()
          var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

          var Calendar = FullCalendar.Calendar;
          var Draggable = FullCalendar.Draggable;

          var containerEl = document.getElementById('external-events');
          var checkbox = document.getElementById('drop-remove');
          var calendarEl = document.getElementById('calendar');

          // initialize the external events
          // -----------------------------------------------------------------

          new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
              return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
              };
            }
          });

          var calendar = new Calendar(calendarEl, {
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            //Random default events
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(info) {
              // is the "remove after drop" checkbox checked?
              if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
              }
            }
          });

          calendar.render();
          // $('#calendar').fullCalendar()

          /* ADDING EVENTS */
          var currColor = '#3c8dbc' //Red by default
          // Color chooser button
          $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            // Save color
            currColor = $(this).css('color')
            // Add color effect to button
            $('#add-new-event').css({
              'background-color': currColor,
              'border-color': currColor
            })
          })
          $('#add-new-event').click(function(e) {
            e.preventDefault()
            // Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
              return
            }

            // Create events
            var event = $('<div />')
            event.css({
              'background-color': currColor,
              'border-color': currColor,
              'color': '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            // Add draggable funtionality
            ini_events(event)

            // Remove event from text input
            $('#new-event').val('')
          })
        })
      </script>

      <script>
        $('#nm_user').click(function() {
          $('#user').modal('show');
        });

        $(document).ready(function() {
          $(document).on('click', '#pilihuser', function() {

            var id = $(this).data('id');
            var username = $(this).data('username');
            var level = $(this).data('level');

            $('#id').val(id);
            $('#nm_user').val(username);
            $('#level').val(level);
            $('#user').modal('hide');
          })
        })
      </script>

      <script>
        $('#pro').click(function() {
          $('#modal-produk').modal('show');
        });

        $(document).on('click', '#produk', function() {
          $('#modal-produk').modal('show');
        });

        $(document).ready(function() {
          $(document).on('click', '#pilihpro', function() {
            var kode = $(this).data('kd');
            var nama = $(this).data('nama');
            var harga = $(this).data('harga');

            $('#pro').val(kode);
            $('#nm_pro').val(nama);
            $('#harga').val(harga);
            $('#modal-produk').modal('hide');
            $('#jumlah').focus();
          })
        })

        function urai() {
          var uraian = document.getElementById("uraian").value;
          document.getElementById("catat").value = uraian;
        }

        function customer() {
          var cst = document.getElementById("cus").value;
          document.getElementById("id_cs").value = cst;
        }

        function kategori() {
          var kt = document.getElementById("kat").value;
          document.getElementById("id_kt").value = kt;
        }

        function bayar() {
          var byr = document.getElementById("by").value;
          document.getElementById("id_byr").value = byr;
        }
      </script>

      <script>
        $(function() {
          $('.select2').select2({
            theme: 'bootstrap4'
          });

          $('.select2').select2({
            theme: 'bootstrap4'
          });
        });
      </script>

      </body>

      </html>