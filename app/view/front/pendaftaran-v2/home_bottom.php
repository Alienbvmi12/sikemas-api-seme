</script>
<script>
    function gritter(pesan, jenis = "info") {
        $.bootstrapGrowl(pesan, {
            type: jenis,
            delay: 3500,
            allow_dismiss: true
        });
    }

    //setup select2 for alamat searching and selections

    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: "Pilih Alamat...",
            ajax: {
                url: 'https://alamat.thecloudalert.com/api/cari/index/',
                dataType: 'json',
                data: function(params) {
                    var query = {
                        keyword: params.term
                    }

                    return query;
                },
                processResults: function(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    const mappedResult = []
                    data.result.forEach(function(obj, idx) {
                        let object = {};
                        object.id = obj.desakel + ", " + obj.kecamatan + ", " + obj.kabkota + ", " + obj.provinsi + ", " + obj.negara;
                        object.text = obj.desakel + ", " + obj.kecamatan + ", " + obj.kabkota + ", " + obj.provinsi + ", " + obj.negara;
                        mappedResult.push(object);
                    });
                    return {
                        results: mappedResult
                    };
                }
            }
        });
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            document.getElementById("nextBtn").click();
        }
    });

    var currentTab = 0; // Current tab is set to be the first tab (0)
    var branch = "branch-permulaan"; //The branch of current process
    let userData = {};
    const listSekolah = JSON.parse('<?= json_encode($list_sekolah) ?>');
    if (checkCookieExists("progress_data") && checkCookieExists("user_data")) {
        branch = "branch-lanjutkan";
        currentTab = 0;
    }
    console.log(getCookie("user_data"));
    userData.telp = "<?= $user->telp ?>";
    userData.custom_vars = [];
    setValCustomVariable("{telp}", userData.telp);
    showTab(currentTab); // Display the current tab
    const dataValidators = [ // Used for store specials function for each tab
        {
            branch: "branch-permulaan",
            tab: "xform-langsung",
            processor: function() {
                if (JSON.parse(userData.tutor_confirm)) {
                    branch = "branch-tutorial";
                    currentTab = -1;
                } else {
                    branch = "branch-main";
                    currentTab = -1;
                }
            }
        },
        {
            branch: "branch-lanjutkan",
            tab: "xform-lanjutkan",
            name: "lanjutkan_confirm",
            processor: function() {
                if (JSON.parse(userData.lanjutkan_confirm)) {
                    branch = getCookie("progress_data").branch;
                    currentTab = getCookie("progress_data").tab - 1;
                    console.log(getCookie("progress_data"));
                    userData = getCookie("user_data");
                    userData.custom_vars.forEach((str, idx) => {
                        str = str.split("=");
                        Array.from(document.getElementsByClassName(str[0])).forEach((element, index) => {
                            element.innerHTML = str[1];
                        });
                    });
                    if (userData.jenjang == "1" || userData.jenjang == "2" || userData.jenjang == "3") {
                        const thisTab = document.getElementById("xform-nisn");
                        setValCustomVariable("{optional}", "tidak wajib diisi jika mendaftar PAUD, TK, dan SD.");
                        thisTab.getElementsByClassName("wiz-form")[0].classList.add("optional");
                        thisTab.getElementsByClassName("wiz-form")[0].placeholder += "(tidak wajib diisi)";
                    }
                } else {
                    deleteCookie("progress_data");
                    deleteCookie("user_data");
                    branch = "branch-permulaan";
                    currentTab = -1;
                }
            }
        },
        {
            branch: "branch-permulaan",
            tab: "xform-tutorial-confirm",
            processor: function() {
                if (JSON.parse(userData.tutor_confirm)) {
                    setValCustomVariable("{tutor}", "Anda akan mengikuti tutorial terlebih dahulu sebelum menjawab pertanyaan, langsung saja kita mulai tutorial-nya");
                } else {
                    setValCustomVariable("{tutor}", "Anda akan langsung menjawab pertannyaan, jawab setiap pertanyaan dengan baik dan teliti ya...");
                }
            }
        },
        {
            branch: "branch-tutorial",
            tab: "xform-tutorial-finish",
            processor: function() {
                branch = "branch-main";
                currentTab = -1;
            }
        },
        {
            branch: "branch-main",
            tab: "xform-nama-confirm",
            name: "nama_confirm",
            processor: function() {
                if (JSON.parse(userData.nama_confirm.toLowerCase())) {
                    const targetTab = document.getElementById("xform-has-bank-confirm");
                } else {
                    const targetTab = document.getElementById("xform-nama-confirm");
                    resetCustomVariable("{nama}");
                    delete userData.nama;
                    openTab("xform-nama");
                }
            }
        },
        {
            branch: "branch-main",
            tab: "xform-nama",
            processor: function() {
                setValCustomVariable("{nama}", userData.nama);
            }
        },
        {
            branch: "branch-main",
            tab: "xform-has-bank-confirm",
            name: "rekening_confirm",
            processor: function() {
                let value = JSON.parse(userData.rekening_confirm.toLowerCase());
                if (value) {
                    console.log("ok");
                } else {
                    deleteCookie("progress_data");
                    deleteCookie("user_data")
                    console.log("not ok");
                    const targetTab = document.getElementById(this.tab);
                    resetCustomVariable("{nama}");
                    branch = "branch-gabisa-daftar";
                    delete userData.nama;
                    currentTab = -1;
                }
            }
        },
        {
            branch: "branch-main",
            tab: "xform-telp-confirm",
            name: "telp_confirm",
            processor: function() {
                if (JSON.parse(userData.telp_confirm.toLowerCase())) {
                    console.log("ok");
                } else {
                    console.log("not ok");
                    branch = "branch-masukan-ulang-telepon";
                    currentTab = -1;
                }
            }
        },
        {
            branch: "branch-masukan-ulang-telepon",
            tab: "xform-masukan-ulang-telepon",
            processor: function() {
                resetCustomVariable("{telp}");
                setValCustomVariable("{telp}", userData.telp);
                branch = "branch-main";
                openTab("xform-telp-confirm");
            }
        },
        {
            branch: "branch-main",
            tab: "xform-mau-apa",
            processor: function() {
                const actors = [
                    "anda",
                    "anak anda",
                    "saudara anda"
                ];
                let val = actors[userData.daftarkan_siapa];
                resetCustomVariable("{actor}");
                setValCustomVariable("{actor}", val);
                if (userData.daftarkan_siapa != 0) {
                    branch = "branch-daftarkan-anak";
                    currentTab = -1;
                }
            }
        },
        {
            branch: "branch-main",
            tab: "xform-jenjang",
            type: "once",
            processor: function() {
                const thisTab = document.getElementById("xform-nisn");
                if (userData.jenjang == "1" || userData.jenjang == "2" || userData.jenjang == "3") {
                    setValCustomVariable("{optional}", "tidak wajib diisi jika mendaftar PAUD, TK, dan SD.");
                    thisTab.getElementsByClassName("wiz-form")[0].classList.add("optional");
                    thisTab.getElementsByClassName("wiz-form")[0].placeholder += "(tidak wajib diisi)"
                }
                const radios = Array.from(document.getElementById(this.tab).getElementsByClassName("wiz-form"));
                radios.forEach((element, idx) => {
                    if (element.value == userData.jenjang) {
                        console.log(true);
                        userData.a_institusi_id = element.getAttribute("value-sekolah");
                    }
                });
            }
        },
        {
            branch: "branch-main",
            tab: "xform-kewarganegaraan",
            type: "once",
            processor: function() {
                if (JSON.parse(userData.kewarganegaraan)) {
                    branch = "branch-no-warga-negara";
                    currentTab = -1;
                } else {
                    branch = "branch-no-warga-negara";
                    currentTab = 0;
                }
            }
        },
        {
            branch: "branch-daftarkan-anak",
            tab: "xform-kewarganegaraan-anak",
            type: "once",
            processor: function() {
                if (JSON.parse(userData.kewarganegaraan_anak)) {
                    branch = "branch-no-warga-negara-anak";
                    currentTab = -1;
                } else {
                    branch = "branch-no-warga-negara-anak";
                    currentTab = 0;
                }
            }
        },
        {
            branch: "branch-no-warga-negara",
            tab: ["xform-nik", "xform-kitas"],
            processor: function() {
                if (userData.daftarkan_siapa == "1" || userData.daftarkan_siapa == "2") {
                    branch = "branch-daftarkan-anak";
                    openTab("xform-pemberitahuan-anak");
                } else {
                    branch = "branch-main";
                    openTab("xform-pekerjaan");
                }
            }
        },
        {
            branch: "branch-no-warga-negara",
            tab: ["xform-nik-anak", "xform-kitas-anak"],
            type: "once",
            processor: function() {
                branch = "branch-daftarkan-anak";
                openTab("xform-tinggal-bersama");
            }
        },
        {
            branch: "branch-daftarkan-anak",
            tab: "xform-tinggal-bersama",
            name: "tinggal_bersama_confirm",
            processor: function() {
                if (JSON.parse(userData.tinggal_bersama_confirm)) {
                    userData.alamat_anak = userData.alamat;
                    userData.alamat_anak_detail = userData.alamat_detail;
                    branch = "branch-main";
                    openTab("xform-jenjang");
                }
            }
        },
        {
            branch: "branch-daftarkan-anak",
            tab: "xform-alamat-anak",
            type: "once",
            processor: function() {
                branch = "branch-main";
                openTab("xform-jenjang");
            }
        },
        {
            branch: "branch-main",
            tab: "xform-anak-ke",
            type: "once",
            processor: function() {
                if (userData.daftarkan_siapa == 0 || userData.daftarkan_siapa == 2) {
                    branch = "branch-ayah";
                    openTab("xform-pemberitahuan-ayah");
                } else {
                    branch = "branch-ortu-sebagai";
                    openTab("xform-ayah-or-ibu");
                }
            }
        },
        {
            branch: "branch-ortu-sebagai",
            tab: "xform-ayah-or-ibu",
            processor: function() {
                setValCustomVariable("{ortu}", userData.select_ortu);
                if (userData.select_ortu === "ibu") {
                    setValCustomVariable("{pasangan}", "ayah");
                } else {
                    setValCustomVariable("{pasangan}", "ibu");
                }
            }
        },
        {
            branch: "branch-ortu-sebagai",
            tab: "xform-menikah",
            processor: function() {
                if (JSON.parse(userData.menikah_confirm)) {
                    if (userData.select_ortu === "ayah") {
                        branch = "branch-ibu";
                        currentTab = -1;
                    } else {
                        branch = "branch-ayah";
                        currentTab = -1;
                    }
                } else {
                    branch = "branch-konfirmasi-masukan-data-pasangan";
                    currentTab = -1;
                }
            }
        },
        {
            branch: "branch-konfirmasi-masukan-data-pasangan",
            tab: "xform-masukan-informasi-pasangan",
            processor: function() {
                if (JSON.parse(userData.masukan_pasangan)) {
                    if (userData.select_ortu === "ayah") {
                        branch = "branch-ibu";
                        openTab("xform-pemberitahuan-ibu");
                    } else {
                        branch = "branch-ayah";
                        openTab("xform-pemberitahuan-ayah");
                    }
                } else {
                    branch = "branch-punya-wali";
                    openTab("xform-punya-wali");
                }
            }
        },
        {
            branch: "branch-ayah",
            tab: "xform-kewarganegaraan-ayah",
            type: "once",
            processor: function() {
                branch = "branch-no-warga-negara-ayah";
                if (JSON.parse(userData.kewarganegaraan_ayah)) {
                    currentTab = -1;
                } else {
                    currentTab = 0;
                }
            }
        },
        {
            branch: "branch-no-warga-negara-ayah",
            tab: ["xform-nik-ayah", "xform-kitas-ayah"],
            type: "once",
            processor: function() {
                if (userData.daftarkan_siapa == 1) {
                    branch = "branch-punya-wali";
                    openTab("xform-punya-wali");
                } else {
                    branch = "branch-ibu";
                    openTab("xform-pemberitahuan-ibu");
                }
            }
        },
        {
            branch: "branch-ibu",
            tab: "xform-kewarganegaraan-ibu",
            type: "once",
            processor: function() {
                branch = "branch-no-warga-negara-ibu";
                if (JSON.parse(userData.kewarganegaraan_ibu)) {
                    currentTab = -1;
                } else {
                    currentTab = 0;
                }
            }
        },
        {
            branch: "branch-no-warga-negara-ibu",
            tab: ["xform-nik-ibu", "xform-kitas-ibu"],
            type: "once",
            processor: function() {
                if (userData.daftarkan_siapa != 2) {
                    branch = "branch-punya-wali";
                    openTab("xform-punya-wali");
                } else {
                    branch = "branch-terimakasih";
                    currentTab = -1;
                }
            }
        },
        {
            branch: "branch-wali",
            tab: "xform-kewarganegaraan-wali",
            type: "once",
            processor: function() {
                branch = "branch-no-warga-negara-wali";
                if (JSON.parse(userData.kewarganegaraan_wali)) {
                    currentTab = -1;
                } else {
                    currentTab = 0;
                }
            }
        },
        {
            branch: "branch-no-warga-negara-wali",
            tab: ["xform-nik-wali", "xform-kitas-wali"],
            type: "once",
            processor: function() {
                branch = "branch-terimakasih";
                currentTab = -1;
            }
        },
        {
            branch: "branch-punya-wali",
            tab: "xform-punya-wali",
            type: "once",
            processor: function() {
                if (JSON.parse(userData.has_wali)) {
                    branch = "branch-wali";
                    currentTab = -1;
                } else {
                    branch = "branch-terimakasih";
                    currentTab = -1;
                }
            }
        }
    ];

    function showTab(n) {
        // This function will display the specified tab of the form...
        var w = document.getElementById(branch);
        var x = w.getElementsByClassName("tab");
        x[n].style.display = "block";
        // Set the title to current tab data
        setTitle(n);
        if (x[n].id == "xform-terimakasih") {
            // ... the form gets submitted:
            sendData();
        }
        //... and fix the Previous/Next buttons:
        //... and run a function that will display the correct step indicator:
        /* fixStepIndicator(n) */
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var w = document.getElementById(branch);
        var x = w.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Execute custom method of a tab:
        storeData();
        executeSectionMethod();
        // Increase current tab counting
        currentTab = currentTab + n;
        // Reinitializing current tab
        w = document.getElementById(branch);
        x = w.getElementsByClassName("tab");
        if (branch != "branch-permulaan") {
            setCookie("user_data", userData, 9);
            setCookie("progress_data", {
                branch: branch,
                tab: currentTab
            }, 9);
        }
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            console.log(userData);
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, w, valid = true,
            msg = "<h4>Perhatian!</h4>Mohon isi semua data yang wajib diisi!!";
        w = document.getElementById(branch);
        x = w.getElementsByClassName("tab");
        y = x[currentTab].getElementsByClassName("wiz-form");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            //Checking, is the class nullable?
            if (!y[i].classList.contains("optional")) {
                // If a field is empty...
                //Validation for input type radio and checkbox
                if (y[i].getAttribute("type") == "radio" || y[i].getAttribute("type") == "checkbox") {
                    let tabChilds = x[currentTab].getElementsByClassName('questions-form')[0].getElementsByClassName("wiz-form");
                    let radio = [];
                    Array.from(tabChilds).forEach((element, index) => {
                        if (element.getAttribute("name") == y[i].getAttribute("name")) {
                            radio.push(element);
                        }
                    });
                    let rLen = radio.length;
                    let counter = 0;
                    radio.forEach((element, index) => {
                        if (element.checked) {
                            counter++;
                        }
                    });
                    if (!counter >= 1) {
                        radio.forEach((element, index) => {
                            element.classList.remove("invalid");
                            element.className += " invalid";
                        });
                        valid = false;
                    }
                }
                //Validation for anoter input
                else {
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].className += " invalid";
                        // and set the current valid status to false
                        valid = false;
                    }
                }
            }

            if ((!y[i].classList.contains("optional")) || y[i].value.length > 0) {
                if (y[i].hasAttribute("maxlength")) {
                    if (parseInt(y[i].getAttribute("maxlength")) < y[i].value.length) {
                        valid = false;
                        msg = "<h4>Perhatian!</h4> jumlah karakter " + y[i].getAttribute("name") + " tidak boleh lebih dari " + y[i].getAttribute("maxlength") + "!!";
                    }
                }

                if (y[i].hasAttribute("minlength")) {
                    if (parseInt(y[i].getAttribute("minlength")) > y[i].value.length) {
                        valid = false;
                        msg = "<h4>Perhatian!</h4> jumlah karakter " + y[i].getAttribute("name") + " tidak boleh kurang dari " + y[i].getAttribute("minlength") + "!!";
                    }
                }
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            // Execute special method if it exsist

        } else {
            gritter(msg, "warning");
        }
        return valid; // return the valid status
    }

    /*  function fixStepIndicator(n) {
         // This function removes the "active" class of all steps...
         var i, x = document.getElementsByClassName("step");
         for (i = 0; i < x.length; i++) {
             x[i].className = x[i].className.replace(" active", "");
         }
         //... and adds the "active" class on the current step:
         x[n].className += " active";
     } */

    function executeSectionMethod() {
        //Initialize required variables
        var x, y, w;
        w = document.getElementById(branch);
        x = w.getElementsByClassName("tab");
        y = x[currentTab].getElementsByClassName("wiz-form");
        const objStore = [];
        //Checking dataValidators object for each input name
        if (!y.length < 1) {
            for (var index = 0; index < y.length; index++) {
                let type = false;
                dataValidators.forEach((obj, idx) => {
                    if (Array.isArray(obj.tab)) {
                        obj.tab.forEach((tabid, arrIdx) => {
                            if (x[currentTab].id === tabid) {
                                if (obj.hasOwnProperty("name")) {
                                    if (Array.isArray(obj.name)) {
                                        obj.name.forEach((val, thisIndex) => {
                                            if (y[index].getAttribute("name") === obj.name[thisIndex]) {
                                                if (obj.hasOwnProperty("branch")) {
                                                    if (obj.branch == branch) {
                                                        //store object to objStore variables
                                                        objStore.push(obj);
                                                    }
                                                } else {
                                                    objStore.push(obj);
                                                }
                                            }
                                        });
                                    } else if (typeof obj.name === "string") {
                                        if (y[index].getAttribute("name") === obj.name) {
                                            if (obj.hasOwnProperty("branch")) {
                                                if (obj.branch == branch) {
                                                    //store object to objStore variables
                                                    objStore.push(obj);
                                                }
                                            } else {
                                                objStore.push(obj);
                                            }
                                        }
                                    }
                                } else {
                                    objStore.push(obj);
                                }
                            }
                        });
                    } else {
                        if (x[currentTab].id === obj.tab) {
                            if (obj.hasOwnProperty("name")) {
                                if (Array.isArray(obj.name)) {
                                    obj.name.forEach((val, thisIndex) => {
                                        if (y[index].getAttribute("name") === obj.name[thisIndex]) {
                                            if (obj.hasOwnProperty("branch")) {
                                                if (obj.branch == branch) {
                                                    //store object to objStore variables
                                                    objStore.push(obj);
                                                }
                                            } else {
                                                objStore.push(obj);
                                            }
                                        }
                                    });
                                } else if (typeof obj.name === "string") {
                                    if (y[index].getAttribute("name") === obj.name) {
                                        if (obj.hasOwnProperty("branch")) {
                                            if (obj.branch == branch) {
                                                //store object to objStore variables
                                                objStore.push(obj);
                                            }
                                        } else {
                                            objStore.push(obj);
                                        }
                                    }
                                }
                            } else {
                                objStore.push(obj);
                            }
                        }
                    }
                    if (obj.hasOwnProperty("type")) {
                        if (obj.type === "once") {
                            type = true;
                        }
                    }
                });
                if (type) {
                    break;
                }
            }
        } else {
            dataValidators.forEach((obj, idx) => {
                if (Array.isArray(obj.tab)) {
                    obj.tab.forEach((tabid, arrIdx) => {
                        if (x[currentTab].id === tabid) {
                            if (obj.hasOwnProperty("branch")) {
                                if (obj.branch == branch) {
                                    //store object to objStore variables
                                    objStore.push(obj);
                                }
                            } else {
                                objStore.push(obj);
                            }
                        }
                    });
                } else {
                    if (x[currentTab].id === obj.tab) {
                        if (obj.hasOwnProperty("branch")) {
                            if (obj.branch == branch) {
                                //store object to objStore variables
                                objStore.push(obj);
                            }
                        } else {
                            objStore.push(obj);
                        }
                    }
                }
                if (obj.hasOwnProperty("type")) {
                    if (obj.type === "once") {
                        type = true;
                    }
                }
            });
        }
        //Execute stored objects method
        objStore.forEach((obj, idx) => {
            obj.processor();
        });

        // Reset the value of inputs

        for (var index = 0; index < y.length; index++) {
            if (y[index].type === "radio" || y[index].type === "radio") {
                y[index].checked = false;
            } else {
                y[index].value = "";
            }
        }
    }

    function setTitle(n) {
        var w = document.getElementById(branch);
        var tabs = w.getElementsByClassName("tab");
        let title = tabs[n].getElementsByClassName("tab-title")[0];
        if (title) {
            document.querySelector("#magical-title").innerHTML = title.value;
        } else {
            document.querySelector("#magical-title").innerHTML = "";
        }
    }

    function removeWritenVar(target, value, replacer = "") {
        const targetTab = target;
        targetTab.querySelector("article").innerHTML = targetTab.querySelector("article").innerHTML.replace(value, replacer);
    }

    function getByName(targetArray, name) {
        const context = [];
        targetArray.forEach((elm, idx) => {
            if (elm.nodeName !== "#text") {
                if (elm.getAttribute("name") == name) {
                    context.push(elm);
                }
            }
        });
        return context;
    }

    function storeData() {
        var w = document.getElementById(branch);
        var x = w.getElementsByClassName("tab");
        y = x[currentTab].getElementsByClassName("wiz-form");
        Array.from(y).forEach((element, index) => {
            if (element.getAttribute("type") === "radio") {
                if (element.checked) {
                    userData[element.getAttribute("name")] = element.value;
                    console.log(userData);
                }
            } else {
                userData[element.getAttribute("name")] = element.value;
                console.log(userData);
            }
        });
    }

    function resetCustomVariable(variable) {
        Array.from(document.getElementsByClassName(variable)).forEach((element, index) => {
            element.innerHTML = "";
        });
        userData.custom_vars.forEach((str, idx) => {
            if (str.split("=")[0] == variable) {
                userData.custom_vars.splice(idx, 1);
            }
        });
    }

    function setValCustomVariable(variable, value) {
        Array.from(document.getElementsByClassName(variable)).forEach((element, index) => {
            element.innerHTML = value;
        });
        userData.custom_vars.push(variable + "=" + value);
    }

    function openTab(idTab) {
        const thisTab = document.getElementById(branch);
        let tabs = thisTab.getElementsByClassName("tab");
        Array.from(tabs).forEach((element, index) => {
            if (idTab === element.id) {
                currentTab = index - 1;
            }
        });
    }

    function filterFunction(context) {
        var input, filter, ul, li, a, i;
        input = context;
        filter = input.value.toUpperCase();
        div = context.parentNode.parentNode.parentNode;
        li = div.getElementsByTagName("li");
        a = li;
        for (i = 0; i < a.length; i++) {
            txtValue = li[i].childNodes[0].innerText || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

    // Function to set a cookie with an object
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + encodeURIComponent(JSON.stringify(value)) + expires + "; path=/";
    }

    // Function to get a cookie value and parse it back to an object
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) {
                var value = c.substring(nameEQ.length, c.length);
                try {
                    return JSON.parse(decodeURIComponent(value));
                } catch (e) {
                    return null;
                }
            }
        }
        return null;
    }

    function deleteCookie(cookieName) {
        document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }


    function checkCookieExists(cookieName) {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            if (cookie.indexOf(cookieName + '=') === 0) {
                return true;
            }
        }
        return false;
    }

    function sendData() {
        NProgress.start();
        document.getElementById("nextBtn").disabled = true;
        $.ajax({
            url: "<?= base_url("front/pendaftaran_v2/store") ?>",
            type: "POST",
            contentType: "application/json",
            dataType: "json",
            data: JSON.stringify(userData),
            success: function(response) {
                if (response.status == 200) {
                    gritter("<h4>Success</h4>Pendaftaran berhasil!!", "success");
                    gritter("Anda akan diarahkan ke tahap pembayaran dalam 5 detik!!", "success");
                    setTimeout(() => {
                        NProgress.done();
                        deleteCookie("progress_data");
                        deleteCookie("user_data")
                        window.location.replace("<?= base_url('/front/bayar_pendaftaran') ?>");
                    }, 5000);
                } else {
                    document.getElementById("nextBtn").disabled = false;
                    gritter("<h4>Oops!</h4> Sepertinya sistem sedang bermasalah, mohon maaf", "error");
                    gritter("Sepertinya progress anda tidak akan tersimpan", "error");
                }
            },
            error: function(xhr, status, error) {
                document.getElementById("nextBtn").disabled = false;
                gritter("<h4>Oops!</h4> Sepertinya sistem sedang bermasalah, mohon maaf", "error");
                gritter("Sepertinya progress anda tidak akan tersimpan", "error");
            }
        });
    }

    /*     function removeUniqueAndNumbers(str){
        // Remove all other characters
        const result = str.replace(/[^a-zA-Z\']/g, '');
        return result;
    } */