<!-- begin:: Footer -->
<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
</div>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->



		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#2c77f4",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>



		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->


		<!--begin::Page Scripts(used by this page) -->
		<script src="assets/js/pages/dashboard.js" type="text/javascript"></script>

		<!--end::Page Scripts -->

        <!--begin::Page Scripts(used by login page) -->
        <script src="assets/js/pages/custom/login/login-general.js" type="text/javascript"></script>

        <!--begin::Page Vendors(used by total complexity page) -->
        <script src="assets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

        <!--begin::Page Scripts(used by tables) -->
        <script src="assets/js/pages/crud/datatables/advanced/footer-callback.js" type="text/javascript"></script>

        <!--begin::Page Scripts(used by this profile) -->
        <script src="assets/js/pages/dashboard.js" type="text/javascript"></script>
        <script src="assets/js/pages/custom/user/profile.js" type="text/javascript"></script>

        <!--begin::Page Scripts(used by file upload) -->
        <script src="assets/js/pages/crud/file-upload/dropzonejs.js" type="text/javascript"></script>

        <!--begin::Page Scripts(used by sweetalert) -->
        <script src="assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>

        <script>
            let $button = $("#submit_content");
            $button.prop("disabled", true);

            $('#paste_contents').bind("change keyup input",function() {
                $button.prop("disabled", (this.value == "")? true : false);
            });
        </script>

        <script>
        function toggleFullScreen() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
        } else {
        if (document.cancelFullScreen) {
        document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
        }
        }
        }
        </script>



</body>

	<!-- end::Body -->
</html>
