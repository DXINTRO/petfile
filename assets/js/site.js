$(document).ready(function () {

    jQuery.validator.addMethod("notEqual", function (value, element, param) {
        var target = $(param);
        if (this.settings.onfocusout) {
            target.unbind(".validate-equalTo").bind("blur.validate-equalTo", function () {
                $(element).valid();
            });
        }
        return value.toLowerCase() !== target.val().toLowerCase();
    }, "Username must be different from Email");
//////////////////////////////menuu/////////////////////////////////////////////////
    if ($('#userManageReservation').length) {
        userManageReservation();
    } else if ($('#homepage').length) {
        $('.navMainLayout li#navHome').addClass('active');
    } else if ($('#userRegister').length) {
        userRegister();
    } else if ($('#userReserve').length) {
        userReserve();
    } else if ($('#sigInPage').length) {
        sigInPage();
    } else if ($('#orderPage').length) {
        orderPage();
    } else if ($("#adminAddService").length) {
        adminAddService();
    } else if ($("#adminManageReservation").length) {
        adminManageReservation();
    } else if ($("#adminUsersOrder").length) {
        adminUsersOrder();
    } else if ($("#adminProducts").length) {
        adminProducts();
    } else if ($("#adminAddUser").length) {
        adminAddUser();
    } else if ($("#admin_Pets").length) {
        admin_Pets();
    } else if ($('#viewCartPage').length) {
        viewCartPage();
    } else if ($('#admin_Pets').length) {//new
        viewPetPage();
    }
////////////////////////////funciones del menu///////////////////////////////////////
    function userManageReservation() {
        $('#myModal').on('hidden.bs.modal', function () {
            resetReservationModal("#myModal");
        });
        $("body").on("change", ".reserveTimeSelect", function (e) {
            if ($(this).val() != 0) {
                $(".reserveTime").text($(".reserveTimeSelect option:selected").text());
            }
        });

        $("#datepicker").datepicker({
            onSelect: function (date, obj) {
                if ($(".reserveDate").length) {
                    $(".reserveDate").text(date);
                }
            },
            minDate: '0'
        });
        $("[name='PetsId']").on('change', function () {
            if ($(this).val() != "Seleccione un Paciente") {
                $(".petNameUser").text($("[name='PetsId'] option:selected").text());
            } else {
                $(".petNameUser").text('');
            }
        });

        $('.userNavbar li.navReserveManage').addClass('active');

        $("body").on("click", ".editReservation", function () {
            $("#editReserveModal #myModalLabel").text($(this).parent().parent().parent().children('.serviceTitle').text());
            get($(this).attr("data-objectId"));

        });

        $('#editReserveModal').on('hidden.bs.modal', function () {
            $(".pk_form").val(0);
            resetReservationModal("#editReserveModal");
        });

        $("body").on("click", ".updateReservation", function (e) {
            var $pk_form = $(".pk_form").val();
            if ($(".reserveDate").text() != "" && $(".reserveTime").text() != "" && $(".reserveDoctorSelect").val() != "" && $(".reservePetsSelect").val() != "") {
                var serviceId = $(this).attr("data-objectId");
                var doctorsId = parseInt($(".reserveDoctorSelect option:selected").val());
                var petsId = parseInt($(".reservePetsSelect option:selected").val());
                $.ajax({
                    method: "POST",
                    async: false,
                    data: {
                        'reserveDate': $(".reserveDate").text(),
                        'reserveTime': $(".reserveTime").text(),
                        'serviceId': $pk_form,
                        'petsId': petsId,
                        'pk_form': $pk_form,
                        'doctorsId': doctorsId
                    },
                    url: "checkReservationAvailable",
                    statusCode: {
                        500: function () {
                            $('.addSuccess').hide();
                            alert("Esta fecha y hora ya está reservada. Favor seleccione otra.");
                        },
                        203: function () {
                            $('.addSuccess').hide();
                            alert("Solo puedes realizar un Máximo de 2 Reservas, para Agregar otras favor llame a Secretaria de Clinica Morita");
                            $('#editReserveModal').modal('hide');
                        },
                        200: function () {
                            $.ajax({
                                method: "POST",
                                async: false,
                                data: {
                                    'reserveDate': $(".reserveDate").text(),
                                    'reserveTime': $(".reserveTime").text(),
                                    'serviceId': serviceId,
                                    'petsId': petsId,
                                    'pk_form': $pk_form,
                                    'doctorsId': doctorsId
                                },
                                url: "updateReservation",
                                success: function (data, status, jqXHR) {
                                    $('#editReserveModal').modal('hide');
                                    reloadUserManageReservationTable();
                                }
                            });
                        }
                    }

                });
                $('#myModal .alert').hide();
            } else {
                $('#myModal .alert').show();
            }

        });

        $("body").on("click", ".deleteReservation", function (e) {
            $("#confirmationModal h5.message").text("Esta seguro de eliminar? " + $(this).parent().parent().children('.serviceTitle').text() + "?")
            $("#confirmationModal .confirmAction").attr("data-confirm", "confirmDelete");
            $("#confirmationModal .confirmAction").attr("data-objectId", $(this).attr("data-objectId"));
            $("#confirmationModal").modal();
        });

        $("body").on("click", "#confirmationModal .confirmAction", function (e) {
            var $this = $(this);
            if ($this.attr("data-confirm") == "confirmDelete") {
                deleteUserReserVation();
            }
        });
        function get(idpk) {
            $(".pk_form").val(0);
            $.post("getREservation",
                    {id: idpk})
                    .done(function (data) {
                        var r = JSON.parse(data);
                        if (r.response === 1) {
                            $(".reserveDate").text(r.data.reserveDate);
                            $(".petNameUser").text(r.data.petNameUser);
                            $("[name='PetsId']").val(r.data.pettId).trigger('change');
                            $(".reserveDoctorSelect").val(r.data.doctorsId);
                            $(".reserveTime").text(r.data.reserveTime);
                            $("#editReserveModal").modal();
                            $(".pk_form").val(r.data.objectId);
                            $(".updateReservation").attr("data-objectId", r.data.serviceId);
                        }
                    });
        }
        function deleteUserReserVation() {
            $.ajax({
                method: "POST",
                async: true,
                data: {
                    'serviceId': $("#confirmationModal .confirmAction").attr("data-objectId")
                },
                url: "deleteReservation",
                success: function (data, status, jqXHR) {
                    reloadUserManageReservationTable();
                    $('#confirmationModal').modal('hide');
                    $(".reservationAlert strong").text("Eliminado!");
                    $(".reservationAlert").show();
                }
            });
        }
    }

    function userReserve() {
        $('.userNavbar li.navReserve').addClass('active');
        rebuildReservation();

        $("body").on("click", ".submitReservation", function (e) {
            if ($(".reserveDate").text() != "" && $(".reserveTime").text() != "" && $(".reserveDoctorSelect").val() != "" && $(".reservePetsSelect").val() != "") {
                var serviceId = $(this).attr("data-objectId");
                var doctorsId = parseInt($(".reserveDoctorSelect option:selected").val());
                var petsId = parseInt($(".reservePetsSelect option:selected").val());
                $.ajax({
                    method: "POST",
                    async: false,
                    data: {
                        'reserveDate': $(".reserveDate").text(),
                        'reserveTime': $(".reserveTime").text(),
                        'serviceId': serviceId,
                        'petsId': petsId,
                        'pk_form': null,
                        'doctorsId': doctorsId
                    },
                    url: "user/checkReservationAvailable",
                    statusCode: {
                        500: function () {
                            $('.addSuccess').hide();
                            alert("Esta fecha y hora ya está reservada. Favor seleccione otra.");
                        },
                        203: function () {
                            $('.addSuccess').hide();
                            alert("Solo puedes realizar un Máximo de 2 Reservas, para Agregar otras favor llame a Secretaria de Clinica Morita");
                            $('#myModal').modal('hide');
                        },
                        200: function () {
                            $.ajax({
                                method: "POST",
                                async: false,
                                data: {
                                    'reserveDate': $(".reserveDate").text(),
                                    'reserveTime': $(".reserveTime").text(),
                                    'serviceId': serviceId,
                                    'petsId': petsId,
                                    'doctorsId': doctorsId
                                },
                                url: "user/addReservation",
                                success: function (data, status, jqXHR) {
                                    $('#myModal').modal('hide');
                                    $('.addSuccess').show();
                                    $('.searchUserServices').click();
                                }
                            });
                        }
                    }

                });
                $('#myModal .alert').hide();
            } else {
                $('#myModal .alert').show();
            }
        });
    }

    function sigInPage() {
        $('.navMainLayout li#navSignin').addClass('active');

        $(".form-signin").validate({
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: $("form").attr("action"),
                    data: $("form").serialize(),
                    success: function (data, status, jqXHR) {
                        console.log(data);
                        location.reload();
                    },
                    error: function (data, status, jqXHR) {

                    },
                    statusCode: {
                        401: function () {
                            $(".alert-danger").show();
                        }
                    }
                });
            }
        });
    }

    function userRegister() {
        $('.navMainLayout li#navUserRegister').addClass('active');

        $('body').on('change', '#inputRut', function (event) {
            var val = $(this).val();
            $.ajax({
                method: "POST",
                data: {
                    'userRutCheck': val
                },
                url: "admin/checkRutExist",
                success: function (data, status, jQxr) {
                    $("#inputRut").val("RUT ya existe!");
                },
                statusCode: {
                    400: function () {
                    }
                }
            });
        });

        $('body').on('change', '#inputEmail', function (event) {
            $.ajax({
                method: "POST",
                data: {
                    'userEmailCheck': $(this).val()
                },
                url: "admin/checkEmailExist",
                success: function (data, status, jQxr) {
                    $("#inputEmail").val("Email ya existe!");
                },
                statusCode: {
                    400: function () {
                    }
                }
            });
        });
        jQuery.validator.addMethod("checkRut", function (value, element) {
            // allow any non-whitespace characters as the host part
            return Fn.validaRut(value);
        }, 'Rut invalido.');

        $("#userRegister").validate({
            rules: {
                inputRut: {
                    checkRut: true
                },
                confirm_inputPassword: {
                    equalTo: "#inputPassword"
                },
                username: {notEqual: "#inputEmail"}
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: $(form).attr("action"),
                    data: $(form).serialize(),
                    success: function (data, status, jqXHR) {
                        $("form").hide();
                        $(".alert-success").show();
                    },
                    statusCode: {
                        400: function () {
                            console.log("nooo");
                        }
                    }
                });
            }
        });

        var Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut: function (rutCompleto) {
                if (!/^[0-9]+-[0-9kK]{1}$/.test(rutCompleto))
                    return false;
                var tmp = rutCompleto.split('-');
                var digv = tmp[1];
                var rut = tmp[0];
                if (digv == 'K')
                    digv = 'k';
                return (Fn.dv(rut) == digv);
            },
            dv: function (T) {
                var M = 0, S = 1;
                for (; T; T = Math.floor(T / 10))
                    S = (S + T % 10 * (9 - M++ % 6)) % 11;
                return S ? S - 1 : 'k';
            }
        };
    }

    function orderPage() {
        $('.userNavbar li.navOrder').addClass('active');

        $('body').on('click', '.addToCart', function (e) {
            $orderRow = $(this).parent().parent();
            $orderQuantityInput = $orderRow.children(".orderQuantity").children("input");
            var productQuantity = parseInt($orderRow.find(".productQuantity").text());


            if ($orderQuantityInput.val() == "" || (parseInt($orderQuantityInput.val()) > productQuantity)) {
                alert("El Stock no es Suficiente!");

            } else if ($orderQuantityInput.val() > 50) {
                alert("La orden máxima es de 50");
                $orderQuantityInput.val("50");
            } else if ($orderQuantityInput.val() == "" || (parseInt($orderQuantityInput.val()) > productQuantity) || parseInt($orderQuantityInput.val()) < 0) {

            } else {
                $('.detailProductName').text($orderRow.children('.productName').text());
                $('.detailProductType span').text($orderRow.children('.productType').text());
                $('.detailProductAmount span').text($orderQuantityInput.val());
                $("#confirmationModal input[name='detailProductAmount']").val($('.detailProductAmount span').text());
                $('.detailPrice span.value').text($orderRow.children('.productPrice').children("span").text());
                $('.detailTotalPrice span.value').text(parseFloat($orderRow.children('.productPrice').children("span").text()) * parseFloat($orderQuantityInput.val()));
                $("#confirmationModal input[name='detailTotalPrice']").val($('.detailTotalPrice span.value').text());
                $('#confirmationModal').modal();
                $('.confirmAction').attr('data-objectId', $(this).attr('data-objectId'));
            }

        });

        $("body").on("click", "#confirmationModal .confirmAction", function (e) {
            var $this = $(this);
            if ($this.attr("data-confirm") == "confirmAddOrder") {
                $.ajax({
                    type: "POST",
                    async: true,
                    data: {
                        'productId': $("#confirmationModal .confirmAction").attr("data-objectId"),
                        'productAmount': $("input[name='detailProductAmount']").val(),
                        'totalPrice': $("input[name='detailTotalPrice']").val()
                    },
                    url: 'addOrder',
                    success: function (data, status, jqXHR) {
                        $('.orderSuccess strong').text("Orden agregada Satisfactoriamente! Puede verlo en el Carro de Compras.")
                        $('.orderSuccess').show();
                        $('#confirmationModal').modal('hide');
                        $.ajax({
                            url: document.URL,
                            success: function (data) {
                                $("#orderPage").html($(data).find("#orderPage").html());
                            }
                        })
                    }, statusCode: {
                        500: function () {
                            console.log("ettt");
                            $('#confirmationModal .modal-footer').prepend(" <strong>Advertencia!</strong> Requerimiento inválido, refresh the page to get the latest quantity count.");
                        }
                    }
                });
            }
        });
    }

    function adminAddService() {
        $('body').on('click', '.editServiceFromAdmin', function (e) {
            $('#addServicecollapse').collapse('show');
            var $row = $(this).closest("tr");
            $("#serviceName").val($row.find(".servicesName").text());
            $("#groupName").val($row.find(".group").text());
            var price = ($row.find(".price").text());
            var pattern = /[0-9]+/g;
            var matches = price.match(pattern);
            $("#priceBox").val(matches[0]);
            $(".pk_form").val($(this).attr("data-objectid"));
            $(".panelAddEditService > .panel-heading .panel-title").text("Actualizar Servicio");

        });

        $('body').on('click', '.backToAddService', function (e) {
            $("#addServicecollapse").collapse('show');
            $(".panelAddEditService > .panel-heading .panel-title").text("Agregar Servicio");
        });

        $('body').on('click', '.removeServiceFromAdmin', function (e) {
            $('#confirmationModal .confirmAction').attr("data-objectid", $(this).attr("data-objectid"));
            $('#confirmationModal .confirmAction').attr("data-confirm", "confirmDeleteAdmin");
            $('#confirmationModal .modal-body').text(" Esta seguro de Eliminar ?");
            $('#confirmationModal').modal();
        });

        $('body').on('click', '.confirmAction', function () {
            $.ajax({
                method: "POST",
                url: 'deleteService',
                data: {
                    'serviceObjectId': $(this).attr("data-objectid")
                },
                success: function (data, status, jqXHR) {
                    $(".addServiceSuccess strong").text("Servicio Eliminado Satisfactoriamente!");
                    $(".addServiceSuccess").show();
                    $('#confirmationModal').modal('hide');
                    $.ajax({
                        url: document.URL,
                        success: function (data) {
                            $("#adminServiceTables").html($(data).find("#adminServiceTables").html());
                        }
                    });
                }
            });
        });

        $('body').on('click', '.searchServicesBtn', function (e) {
            $.ajax({
                method: "POST",
                url: 'searchServicesName',
                data: {
                    'servicesNameSearch': $(".searchServiceTextAdmin").val()
                },
                success: function (data, status, jqXHR) {
                    $("#adminServiceTables").html($(data).find("#adminServiceTables").html());
                }
            });
        });
        $("#addServiceAdmin").validate({
            rules: {
                serviceName: {
                    required: true
                },
                groupName: {
                    required: true
                },
                priceBox: {
                    required: true
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: $(form).attr("action"),
                    data: $(form).serialize(),
                    success: function (data, status, jqXHR) {
                        $("#adminServiceTables tbody").html(data);
                        form.reset();
                        $(".pk_form").val(0);
                        $(".panelAddEditService > .panel-heading .panel-title").text("Agregar un Servicio");
                        $("#addServicecollapse").collapse('hide');
                    },
                    statusCode: {
                        400: function () {
                        }
                    }
                });
            }
        });
    }

    function adminManageReservation() {
        $('.select2-aux').select2();
        rebuildReservation();
        $('body').on('click', '#generateReservationReport', function (e) {
            e.preventDefault();
            if ($('.reportYearTo').val() != 0 && $('.reportYearFrom').val() != 0 && ($('.reportYearFrom').val() <= $('.reportYearTo').val()) && ($('.reportMonthFrom').val() <= $('.reportMonthTo').val())) {
                $("#generatePDF").submit();
                $("#generateUserReportcollapse .alert-danger").hide();
            } else {
                $("#generateUserReportcollapse .alert-danger").show();
                $("#generateUserReportcollapse .alert-danger strong").text("Favor seleccione una fecha apropiada!");
            }
        });

        $('body').on('click', '.adminEditReservation', function (event) {
            $('#collapseOne').collapse('show');
            $('#saveChangesReservation').show();
            $('#backToAddReservation').show();
            $('#addReservationButton').hide();
            $('#addOrEditReservation .panel-title a span:last-child').text("Editar Reserva");
            $("#addReservationAdmin").attr("action", "editReservation");
            $("#reservationId").val($(this).attr("data-objectId"));
            var $row = $(this).closest("tr");
            $("#reservationUserEmail").val($row.find(".userEmail").text());
            $('.adminServicesReservation').select2('val', $row.find('.serviceTitle').attr("data-serviceid"));

            $('#datepicker').datepicker("setDate", new Date($row.find('.serviceDate').text("rrrrrrr")));
            $('.reserveDate').text($row.find('.serviceDate').text("ttttttt"));
            $('.reserveTimeSelect').val($row.find('.serviceTime').text("yyyyyyyy"));
            $('.reserveTime').text($row.find('.serviceTime').text("uuuuuuuu"));

        });

        $('body').on('click', '.adminConfirmReservation', function (event) {
            $("#processReservationModal .registrationId").val($(this).attr("data-objectid"));
            $("#processReservationModal").modal();
        });

        $('body').on('click', '#closeForm', function (event) {
            $(".pk_form").val(0);
            $("#addReservationAdmin")[0].reset();
            $('#collapseOne').collapse('hide');
            rebuildReservation()
//            $(".panelAddEditService > .panel-heading .panel-title").text("Actualizar Servicio");
        });

        $('body').on('click', '.adminApproveReservation', function (event) {
            $("#approveReservationModal .registrationId").val($(this).attr("data-objectid"));
            $("#approveReservationModal").modal();
        });

        $('body').on('click', '.adminDeleteReservation', function (event) {
            $("#confirmationModal h5.message").text("Esta seguro que desea eliminar? " + $(this).parent().parent().children('.serviceTitle').text() + "?");
            $("#confirmationModal .confirmAction").attr("data-confirm", "confirmDelete");
            $("#confirmationModal .confirmAction").attr("data-objectId", $(this).attr("data-objectId"));
            $("#confirmationModal").modal();
        });

        $("body").on("click", "#confirmationModal .confirmAction", function (e) {
            var $this = $(this);
            if ($this.attr("data-confirm") == "confirmDelete") {
                $.ajax({
                    async: true,
                    method: "POST",
                    data: {
                        'reservationObjecId': $(this).attr("data-objectId")
                    },
                    url: "deleteAdminReservation",
                    success: function (data, status, jQxr) {
                        $("#confirmationModal").modal('hide');
                        $(".addReservationSuccess strong").text("Reserva eliminada Satisfacoriamente!");
                        $(".addReservationSuccess").show();
                        $.ajax({
                            url: document.URL,
                            success: function (data) {
                                $("#adminReservationTable").html($(data).find("#adminReservationTable").html());
                            }
                        });
                    },
                    statusCode: {
                        400: function () {

                        }
                    }
                });
            }
        });

        $('body').on('click', '.adminSearchReservation', function (e) {
            $.ajax({
                method: "POST",
                url: 'searchAdminReservation',
                data: {
                    'userEmailSearch': $(".adminSearchReservationText").val()
                },
                success: function (data, status, jqXHR) {
                    $("#adminReservationTable").html($(data).find("#adminReservationTable").html());
                }
            });
        });
        $("body").on("click", ".submitReservation", function (e) {
            if ($(".reserveDate").text() != "" && $(".reserveTime").text() != "" && $(".reserveDoctorSelect").val() != "" && $(".reservePetsSelect").val() != "") {
                var serviceId = $("[name='adminServicesReservation']").val();
                var doctorsId = parseInt($(".reserveDoctorSelect option:selected").val());
                var petsId = parseInt($(".reservePetsSelect option:selected").val());
                $.ajax({
                    method: "POST",
                    async: false,
                    data: {
                        'reserveDate': $(".reserveDate").text(),
                        'reserveTime': $(".reserveTime").text(),
                        'serviceId': serviceId,
                        'petsId': petsId,
                        'pk_form': null,
                        'doctorsId': doctorsId
                    },
                    url: "checkReservationAvailable",
                    statusCode: {
                        500: function () {
                            $('.addSuccess').hide();
                            alert("Esta fecha y hora ya está reservada. Favor seleccione otra.");
                        },
                        203: function () {
                            $('.addSuccess').hide();
                            alert("Solo puedes realizar un Máximo de 2 Reservas por Paciente, para Agregar otras favor llame a Secretaria de Clinica Morita");
                        },
                        200: function () {
                            $.ajax({
                                method: "POST",
                                async: false,
                                data: {
                                    'reserveDate': $(".reserveDate").text(),
                                    'reserveTime': $(".reserveTime").text(),
                                    'serviceId': serviceId,
                                    'petsId': petsId,
                                    'doctorsId': doctorsId
                                },
                                url: "addReservation",
                                success: function (data, status, jqXHR) {
                                    $('.addSuccess').show();
                                    $('#datepicker').datepicker('setDate');
                                    $(".addReservationSuccess strong").text("Reserva agregada exitósamente!");
                                    $(".addReservationSuccess").show();
                                    $(".pk_form").val(0);
                                    $("#addReservationAdmin")[0].reset();
                                    $('#collapseOne').collapse('hide');
                                    rebuildReservation()
                                    $.ajax({
                                        url: document.URL,
                                        success: function (data) {
                                            $("#adminReservationTable").html($(data).find("#adminReservationTable").html());
                                        }
                                    });
                                }
                            });
                        }
                    }

                });
                $('#myModal .alert').hide();
            } else {
                $('#myModal .alert').show();
            }
        });

    }

    function adminUsersOrder() {
        $('body').on('click', '#PrintRecetta', function (e) {
            var id = $(this).closest('tr').attr('data-dataid');
            var url = 'PrintRecetta/?id=' + id;
            window.open(url);
        });

        $('[name=customer]').bind('change', function (e) {
            $.get("getPets_por_id", {id: $(this).val()})
                    .done(function (data) {
                        $('[name=PetsId]').html(data).trigger('chosen:updated');
                    });
        });

        $('body').on('click', '#adminUsersOrder .searchOrderOfUser', function (e) {
            $.ajax({
                method: "POST",
                url: 'searchUserOrder',
                data: {
                    'userEmailSearch': $("#searchUserEmail").val()
                },
                success: function (data, status, jqXHR) {
                    $("#adminOrderTable").html(data);
                }
            });
        });
    }

    function adminProducts() {
        $('body').on('click', '#generateProductReport', function (e) {
            e.preventDefault();
            if ($('.reportYearTo').val() != 0 && $('.reportYearFrom').val() != 0 && ($('.reportYearFrom').val() <= $('.reportYearTo').val()) && ($('.reportMonthFrom').val() <= $('.reportMonthTo').val())) {

                $("#generatePDF").submit();
                $("#generateUserReportcollapse .alert-danger").hide();
            } else {
                $("#generateUserReportcollapse .alert-danger").show();
                $("#generateUserReportcollapse .alert-danger strong").text("Favor seleccione una fecha válida!");
            }
        });
        $('body').on('click', '.searchProductUser', function (e) {
            if ($('input[name=sortCategory1]:checked').val() == "C") {
                console.log("Capsule");
                $.ajax({
                    method: "POST",
                    url: 'searchorder',
                    data: {
                        'userEmailSearch': $(".searchProductUserText").val(),
                        'userSort': "Cap"
                    },
                    success: function (data, status, jqXHR) {
                        $("#orderPage table").html($(data).find("#orderPage table").html());
                    }
                });
            } else if ($('input[name=sortCategory1]:checked').val() == "V") {
                console.log("Vitamins");
                $.ajax({
                    method: "POST",
                    url: 'searchorder',
                    data: {
                        'userEmailSearch': $(".searchProductUserText").val(),
                        'userSort': "Vit"
                    },
                    success: function (data, status, jqXHR) {
                        $("#orderPage table").html($(data).find("#orderPage table").html());
                    }
                });
            } else {
                console.log("Vitamins");
                $.ajax({
                    method: "POST",
                    url: 'searchorder',
                    data: {
                        'userEmailSearch': $(".searchProductUserText").val(),
                        'userSort': ""
                    },
                    success: function (data, status, jqXHR) {
                        $("#orderPage table").html($(data).find("#orderPage table").html());
                    }
                });
            }
        });

        $('body').on('click', '.editProductAdmin', function (e) {
            $parentRow = $(this).closest("tr");
            $(".pk_form").val($(this).attr("data-objectId"));

            $("#productName").val($parentRow.find(".productName").text());
            $("#productQty").val($parentRow.find(".productQuanitty").text());
            $("#productPrice").val($parentRow.find(".productPrice").text().substring(2));
            $("#productType").val($parentRow.find(".productType").text());
            $("#addOrEditReservation > .panel-heading .panel-title").text("Editar Producto");
            $("#collapseOne").collapse('show');
        });

        $('body').on('click', '.removeProductAdmin', function (e) {
            $('#confirmationModal .confirmAction').attr("data-objectid", $(this).attr("data-objectid"));
            $('#confirmationModal .confirmAction').attr("data-confirm", "confirmDeleteAdmin");
            $('#confirmationModal .modal-body').text(" Esta seguro de Eliminar ?");
            $('#confirmationModal').modal();
        });

        $('body').on('click', '.confirmAction', function () {
            $.ajax({
                url: 'deleteProductAdmin',
                method: "POST",
                data: {
                    'objectId': $(this).attr("data-objectId")
                },
                success: function (data, status, jqXHR) {
                    $(".addProductSuccess strong").text("Producto Eliminado Satisfactoriamente!");
                    $(".addProductSuccess").show();
                    $('#confirmationModal').modal('hide');
                    $.ajax({
                        url: document.URL,
                        success: function (data) {
                            $("#adminManageProducts").html($(data).find("#adminManageProducts").html());

                        }
                    });
                }
            });
        });

        $('body').on('click', '.searchManageProductsAdmin', function (e) {
            $.ajax({
                method: "POST",
                url: 'searchAdminProducts',
                data: {
                    'userEmailSearch': $(".searchManageProductsTextAdmin").val()
                },
                success: function (data, status, jqXHR) {
                    $("#adminManageProducts").html($(data).find("#adminManageProducts").html());
                }
            });
        });

        $("#addProduct").validate({
            rules: {
                productName: {
                    required: true
                },
                productQty: {
                    required: true
                },
                productPrice: {
                    required: true
                },
                productType: {
                    required: true
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: $(form).attr("action"),
                    data: $(form).serialize(),
                    success: function (data, status, jqXHR) {
                        $("#adminManageProducts tbody").html(data);
                        form.reset();
                        $(".pk_form").val(0);
                        $("#addOrEditReservation > .panel-heading .panel-title").text("Agregar un Producto");
                        $("#collapseOne").collapse('hide');
                    },
                    statusCode: {
                        400: function () {
                        }
                    }
                });
            }
        });
    }

    function adminAddUser() {
        dataaddpets = [];
        $(".adminNavbar .navAdminUserManage").addClass("active");
        $('body').on('click', '#generateUserReport', function (e) {
            e.preventDefault();
            if ($('.reportYearTo').val() != 0 && $('.reportYearFrom').val() != 0 && ($('.reportYearFrom').val() <= $('.reportYearTo').val()) && ($('.reportMonthFrom').val() <= $('.reportMonthTo').val())) {

                $("#generatePDF").submit();
                $("#generateUserReportcollapse .alert-danger").hide();
            } else {
                $("#generateUserReportcollapse .alert-danger").show();
                $("#generateUserReportcollapse .alert-danger strong").text("Favor seleccione una fecha válida!");
            }
        });
        $('body').on('change', '#userLevelAdd', function (e) {
            if ($(this).val() !== "1") {
                $("#petInformationContainer").hide();
            } else {
                $("#petInformationContainer").show();
            }
        });
        $('body').on('click', '.editUserFromAdmin', function (e) {
            $("#addpetsbtn").hide();
            get($(this).attr('data-objectid'));

        });
        $('body').on('click', '.backToAddUser', function (e) {
            $("#updateUser").hide();
            $("#addUserAdmin").show();
            $(".panelAddEditUser > .panel-heading .panel-title").text("Agregar Usuario");

        });
        $('body').on('click', '#addpetsbtn', function (e) {

            $('#registra-paciente').modal({
                show: true,
                backdrop: 'static'
            });
        });

        $('body').on('click', '#resett', function (e) {
            $('#accordion').click();
            $("#addUserAdmin")[0].reset();
            $(".panelAddEditUser > .panel-heading .panel-title").text("Agregar Usuario");
            $(".pk_form").val(0);

        });
        $('body').on('click', '#accordion', function (e) {
            $("#addpetsbtn").show();

        });
        $('body').on('click', '.removeUserFromAdmin', function (e) {
            $('#confirmationModal .confirmAction').attr("data-objectid", $(this).attr("data-objectid"));
            $('#confirmationModal .confirmAction').attr("data-confirm", "confirmDeleteAdmin");
            $('#confirmationModal .modal-body').text(" ESTÁ SEGURO DE ELIMINAR?");
            $('#confirmationModal').modal();
        });
        $('body').on('click', '.generatenewPassword', function (e) {
            $('#confirmationModal .confirmAction').attr("data-objectid", $("#userObjectIdUpdate").val());
            $('#confirmationModal .confirmAction').attr("data-confirm", "confirmGenerateNewPassword");
            $('#confirmationModal .modal-body').html("<p>Esta seguro de crear una nueva contraseña?</p><p>Tu nueva contraseña será: <span id='newGeneratedPassword' style='color:red;font-weight:bold;'>" + Math.random().toString(36).substring(10) + "</span></p>");

            $('#confirmationModal').modal();
        });

        function get(idpk) {
            $.post("admin/getUser",
                    {id: idpk})
                    .done(function (data) {
                        var r = JSON.parse(data);
                        if (r.response === 1) {
                            $("[name='inputRut']").val(r.data.user_rut);
                            $("[name='inputEmail']").val(r.data.email);
                            $("[name='username']").val(r.data.username);
                            $("[name='firstName']").val(r.data.first_name);
                            $("[name='lastName']").val(r.data.last_name);
                            $("[name=userLevel]").val(r.data.user_level);
                            $("[name='address']").val(r.data.address);
                            $("[name='city']").val(r.data.city);
                            $("[name='contactNo']").val(r.data.contactNo);
                            $("[name='inputPassword']").val(r.data.password);
                            $("[name='confirm_inputPassword']").val(r.data.password);
                            $("[name='Observacion']").val(r.data.Observacion);
                            $(".pk_form").val(idpk);
                            $('#addUsercollpase').collapse('show');
                            $("#addUserAdmin").show();
                            $(".panelAddEditUser > .panel-heading .panel-title").text("Actualizar Usuario");
                        }
                    });
        }
        $('body').on('click', '.confirmAction', function () {
            if ($(this).attr("data-confirm") == "confirmDeleteAdmin") {
                $.ajax({
                    method: "POST",
                    url: 'admin/deleteUser',
                    data: {
                        'userObjectId': $(this).attr("data-objectid")
                    },
                    success: function (data, status, jqXHR) {
                        $(".addUserSuccess strong").text("USUARIO ELIMINADO EXITOSAMENTE!");
                        $(".addUserSuccess").show();
                        $('#confirmationModal').modal('hide');
                        $.ajax({
                            url: document.URL,
                            success: function (data) {
                                $("#adminUsersTable").html($(data).find("#adminUsersTable").html());
                            }
                        });
                    }
                });
            } else if ($(this).attr("data-confirm") == "confirmGenerateNewPassword") {
                $.ajax({
                    method: "POST",
                    url: 'admin/generateNewPassword',
                    data: {
                        'userObjectId': $(this).attr("data-objectid"),
                        'inputPassword': $('#newGeneratedPassword').text()
                    },
                    success: function (data, status, jqXHR) {
                        $(".addUserSuccess strong").text("SU CONTRASEÑA HA SIDO MODIFICADA!");
                        $(".addUserSuccess").show();
                        $('#confirmationModal').modal('hide');

                    }
                });
            }
        });
        jQuery.validator.addMethod("checkRut", function (value, element) {
            // allow any non-whitespace characters as the host part
            return Fn.validaRut(value);
        }, 'Rut invalido.');

        var Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut: function (rutCompleto) {
                if (!/^[0-9]+-[0-9kK]{1}$/.test(rutCompleto))
                    return false;
                var tmp = rutCompleto.split('-');
                var digv = tmp[1];
                var rut = tmp[0];
                if (digv == 'K')
                    digv = 'k';
                return (Fn.dv(rut) == digv);
            },
            dv: function (T) {
                var M = 0, S = 1;
                for (; T; T = Math.floor(T / 10))
                    S = (S + T % 10 * (9 - M++ % 6)) % 11;
                return S ? S - 1 : 'k';
            }
        };
        $("#addUserAdmin").validate({
            rules: {
                inputRut: {
                    checkRut: true
                },
                confirm_inputPassword: {
                    equalTo: "#inputPassword"
                },
                username: {notEqual: "#inputEmail"}
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: $(form).attr("action"),
                    data: $(form).serialize() + '&' + dataaddpets,
                    success: function (data, status, jqXHR) {
                        $(".addUserSuccess strong").text("USUARIO AGREGADO EXITOSAMENTE!");
                        $(".addUserSuccess").show();
                        $.ajax({
                            url: document.URL,
                            success: function (data) {
                                $("#adminUsersTable").html($(data).find("#adminUsersTable").html());
                                $('#accordion').click();
                                $("#addUserAdmin")[0].reset();
                                $('#addpets')[0].reset();
                                dataaddpets = [];
                                $(".panelAddEditUser > .panel-heading .panel-title").text("Agregar Usuario");
                                $(".pk_form").val(0);
                            }
                        });
                    },
                    error: function (data, status, jqXHR) {

                    },
                    statusCode: {
                        400: function () {
                        }
                    }
                });
            }
        });

        $("#addpets").validate({
            rules: {
                petName: {
                    required: true
                }, petSpecies: {
                    required: true
                }, petRace: {
                    required: true
                }, petGender: {
                    required: true
                }, petAge: {
                    required: true
                }, petColor: {
                    required: true
                }, petHistory: {
                    required: true
                }
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                dataaddpets = $('#addpets').serialize();
                $('#registra-paciente').modal('toggle');
            }
        });

    }

    function viewCartPage() {
        $('body').on('click', '.editOrder', function () {
            $orderRow = $(this).parent().parent();
            $orderQuantityInput = $orderRow.children(".orderAmount").text();
            $("#confirmationModal .detailProductName").text($orderRow.children(".productName").text());
            $("#confirmationModal .detailProductAmount input").val($orderRow.children(".orderAmount").text());
            $("#confirmationModal .detailPrice .value").text($orderRow.children(".productPrice").children("span").text());
            $("#confirmationModal .detailTotalPrice .value").text($orderRow.children(".productTotal").children("span").text());
            $("#confirmationModal input[name='detailTotalPrice']").val($orderRow.children(".productTotal").children("span").text());
            $("#confirmationModal input[name='oldValueAmount']").val($("#confirmationModal .detailProductAmount input").val());
            $("#confirmationModal #myModalLabel").text("Edit Order");
            $("#confirmationModal").modal();
            $("#confirmationModal .confirmAction").attr("data-confirm", "confirmUpdate");
            $("#confirmationModal .confirmAction").text("Update");
            $("#confirmationModal .confirmAction").attr("data-objectId", $(this).attr("data-objectId"));
            $("#confirmationModal .confirmAction").attr("data-productId", $(this).attr("data-productId"));
            $("#confirmationModal .editOrderBody").show();
        });

        $('body').on('change', '#confirmationModal .detailProductAmount input', function () {
            $("#confirmationModal .detailTotalPrice .value").text(parseFloat($("#confirmationModal .detailProductAmount input").val()) * parseFloat($("#confirmationModal .detailPrice .value").text()));
            $("#confirmationModal input[name='detailTotalPrice']").val($("#confirmationModal .detailTotalPrice .value").text());
        });

        $('body').on('click', '#checkOut', function (e) {
            $.ajax({
                method: "POST",
                url: "checkoutOrder",
                success: function (data, status, jqXHR) {
                    location.reload();
                }
            });
        });

        $('body').on('click', '#cancelOrder', function (e) {
            $.ajax({
                method: "POST",
                url: "cancelOrder",
                success: function (data, status, jqXHR) {
                    location.reload();
                }
            });
        });

        $('body').on('click', '.removeFromCart', function () {
            $orderRow = $(this).parent().parent();
            $("#confirmationModal #myModalLabel").text("Confirm Remove");
            $("#confirmationModal").modal();
            $("#confirmationModal .detailProductAmount input").val($orderRow.children(".orderAmount").text());
            $("#confirmationModal .removeFromCartBody h4").text("ESTA SEGURO DE BORRAR LA ORDEN?");
            $("#confirmationModal .removeFromCartBody").show();
            $("#confirmationModal .confirmAction").attr("data-objectId", $(this).attr("data-objectId"));
            $("#confirmationModal .confirmAction").attr("data-productId", $(this).attr("data-productId"));
            $("#confirmationModal .confirmAction").attr("data-confirm", "confirmDeleteOrder");
            $("#confirmationModal .confirmAction").text("Yes");
        });

        $('body').on('click', '#payOrder', function () {
            $("#confirmationModal #myModalLabel").text("Pagar Orden");
            $("#confirmationModal").modal();
            $("#confirmationModal .confirmAction").attr("data-confirm", "confirmPay");
            $("#confirmationModal .payOrderBody").show();
        });

        $('#confirmationModal').on('hidden.bs.modal', function () {
            $("#confirmationModal .removeFromCartBody").hide();
            $("#confirmationModal .editOrderBody").hide();
        });

        $('body').on('click', '.confirmAction', function () {
            var $this = $(this);
            if ($this.attr("data-confirm") == "confirmUpdate") {
                $.ajax({
                    type: "POST",
                    async: true,
                    url: 'updateOrder',
                    data: {
                        'orderObjectId': $this.attr("data-objectId"),
                        'newAmount': $("#confirmationModal .detailProductAmount input").val(),
                        'newTotalPrice': $("#confirmationModal input[name='detailTotalPrice']").val(),
                        'productId': $this.attr("data-productId"),
                        'incremental': parseFloat($("#confirmationModal input[name='oldValueAmount']").val()) - parseFloat($("#confirmationModal .detailProductAmount input").val())
                    },
                    success: function (data, status, jqXHR) {
                        $('.cartSuccess strong').text("HA SIDO ACTUALIZADO!!");
                        $('.cartSuccess').show();
                        $.ajax({
                            url: document.URL,
                            success: function (data) {
                                $("#viewCartPage").html($(data).find("#viewCartPage").html());
                                $("#confirmationModal").modal('hide');
                            }
                        });
                    }
                });
            } else if ($this.attr("data-confirm") == "confirmDeleteOrder") {
                $.ajax({
                    type: "POST",
                    async: true,
                    url: 'deleteUserOrder',
                    data: {
                        'orderObjectId': $this.attr("data-objectId"),
                        'incremental': $("#confirmationModal .detailProductAmount input").val(),
                        'productId': $this.attr("data-productId")
                    },
                    success: function (data, status, jqXHR) {
                        $('.cartSuccess strong').text("HA SIDO ELIMINADO !");
                        $('.cartSuccess').show();
                        $.ajax({
                            url: document.URL,
                            success: function (data) {
                                $("#viewCartPage").html($(data).find("#viewCartPage").html());
                                $("#confirmationModal").modal('hide');
                            }
                        });
                    }
                });
            } else if ($this.attr("data-confirm") == "confirmPay") {
                $.ajax({
                    type: "POST",
                    async: true,
                    url: 'payOrder',
                    data: {
                        'batchId': $("#batchId").val(),
                        'remitId': $("#remitId").val(),
                        'trackingNo': $("#trackingNo").val()
                    },
                    success: function (data, status, jqXHR) {
                        $('.cartSuccess strong').text("Los detalles del Pago se enviaron al Admin para su confirmación.");
                        $('.cartSuccess').show();
                        $.ajax({
                            url: document.URL,
                            success: function (data) {
                                $("#viewCartPage").html($(data).find("#viewCartPage").html());
                                $("#confirmationModal").modal('hide');
                            }
                        });
                    }
                });
            }
        });
    }

    function viewPetPage() {//new
        $('.navMainLayout li#navAdminPetManage').addClass('active');
        $('#bd-desde').on('change', function () {
            var desde = $('#bd-desde').val();
            var hasta = $('#bd-hasta').val();
            var url = '../php/busca_paciente_fecha.php';
            $.ajax({
                type: 'POST',
                url: url,
                data: 'desde=' + desde + '&hasta=' + hasta,
                success: function (datos) {
                    $('#agrega-registros').html(datos);
                }
            });
            return false;
        });

        $('#bd-hasta').on('change', function () {
            var desde = $('#bd-desde').val();
            var hasta = $('#bd-hasta').val();
            var url = '../php/busca_paciente_fecha.php';
            $.ajax({
                type: 'POST',
                url: url,
                data: 'desde=' + desde + '&hasta=' + hasta,
                success: function (datos) {
                    $('#agrega-registros').html(datos);
                }
            });
            return false;
        });

        $('#nuevo-paciente').on('click', function () {
            $('#addpets')[0].reset();
            $('#pac').val('Registro');
            $('#edi').hide();
            $('#reg').show();
            $('#registra-paciente').modal({
                show: true,
                backdrop: 'static'
            });
        });

        $('#Search_pet').on('keyup', function () {
            var dato = $('#Search_pet').val();
            $.ajax({
                type: 'POST',
                url: 'busca_paciente',
                data: 'dato=' + dato,
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    $('#agrega-registros tbody').html(obj.response);
                }
            });
            return false;
        });

        $('body').on('click', '#eliminarpet', function (e) {
            $('#confirmationModal .confirmAction').attr("data-objectid", $(this).attr("data-objectid"));
            $('#confirmationModal .confirmAction').attr("data-confirm", "confirmDeleteAdmin");
            $('#confirmationModal .modal-body').text(" Esta seguro de Eliminar este pet ?");
            $('#confirmationModal').modal();
        });
    }

    function admin_Pets() {

        $('#lstmedicament').multiselect({});

        $('body').on('click', '.historial', function (e) {
            var id = $(this).closest('tr').attr('data-dataid');
            $('#historialform')[0].reset();
            $.ajax({
                type: 'POST',
                url: 'get_history_modal',
                data: 'id=' + id,
                success: function (data) {
                    try {
                        var r = jQuery.parseJSON(data);
                        if (r.data !== null) {
                            for (var i in r.data) {
                                $("[name=" + i + "]").val(r.data[i]).trigger("chosen:updated");
                            }
                        }
                        $(".pk_formH").val(id);
                        $("#petCboVaccine").trigger("change");
                        $("#petCboDeworming").trigger("change");
                        $("#petCboDiet").trigger("change");
                        $('#historial').modal('toggle');
                    } catch (e) {
                        console.log(e);
                    }
                }
            });
        });
        $('body').on('click', '.receta', function (e) {
            var id = $(this).closest('tr').attr('data-dataid');
            $("[name='petrecetta']").val('');
            $.ajax({
                type: 'POST',
                url: 'get_prescription_modal',
                data: 'id=' + id,
                success: function (data) {
                    try {
                        var r = jQuery.parseJSON(data);
                        if (r.data !== null) {
                            $(".Paciente").text(r.data.petName);
                            $(".Especie").text(r.data.petSpecies);
                            $(".Propietario").text(r.data.first_name + '-' + r.data.last_name);
                            $(".RUT").text(r.data.user_rut);
                            $(".Domicilio").text(r.data.address);
                            $(".ContraIndicaciones").text(r.data.contraindicaciones);
                            $("[name='petrecetta']").val(r.data.Formulario_receta);
                        }
                        $('#prescription').modal('toggle');
                        $(".pk_formP").val(id);
                    } catch (e) {
                        console.log(e);
                    }
                }
            });
        });
        $('body').on('click', '#addRecetta', function (e) {
            var id = $(".pk_formP").val();
            var text = $("[name='petrecetta']").val();
            $.ajax({
                type: 'POST',
                url: 'addRecetta',
                data: 'id=' + id + '&campo=' + text,
                success: function (data) {
                    try {
                        $('#prescription').modal('toggle');
                        $(".pk_formP").val(0);
                    } catch (e) {
                        console.log(e);
                    }
                }
            });
        });

        $('body').on('click', '.anamnesis', function (e) {
            var id = $(this).closest('tr').attr('data-dataid');
            var name = $(this).closest('tr').find('td:nth-child(1)').text();
            $('#fichaAtention')[0].reset();
            $.ajax({
                type: 'POST',
                url: 'get_fichaAtention_modal',
                data: 'id=' + id,
                success: function (data) {
                    try {
                        var r = jQuery.parseJSON(data);
                        if (r.data !== null) {
                            for (var i in r.data) {
                                $("[name=" + i + "]").val(r.data[i]).trigger("chosen:updated");
                            }
                            $("[name='petname']").val(name);
                            $("#lstmedicament").val(r.dataarray);
                            $("#lstmedicament").multiselect("refresh");
                        }
                        $(".pk_formA").val(id);
                        $('#anamnesis').modal('toggle');
                    } catch (e) {
                        console.log(e);
                    }
                }
            });

        });

        $("#petCboVaccine").change(function () {
            if ($(this).val() !== 'Si') {
                $("[name='petAppliedProducts']").val('').prop("disabled", true);
            } else {
                $("[name='petAppliedProducts']").prop("disabled", false);
            }
        });

        $("#petCboDeworming").change(function () {
            if ($(this).val() !== 'Si') {
                $("[name='petDateDeworming']").val('').prop("disabled", true);
            } else {
                $("[name='petDateDeworming']").prop("disabled", false);
            }
        });
        $("#petCboDiet").change(function () {
            if ($(this).val() !== 'Si') {
                $("[name='petDietApplied']").val('').prop("disabled", true);
            } else {
                $("[name='petDietApplied']").prop("disabled", false);
            }
        });

        $('body').on('click', '.delete', function (e) {
            var id = $(this).closest('tr').attr('data-dataid');
            $('#confirmationModal .confirmAction').attr("data-objectid", id);
            $('#confirmationModal .confirmAction').attr("data-confirm", "confirmDeleteAdmin");
            $('#confirmationModal .modal-body').text(" ESTÁ SEGURO DE ELIMINAR?");
            $('#confirmationModal').modal('toggle');

        });
        $('#Search_pet').on('keyup', function () {
            var dato = $('#Search_pet').val();
            $.ajax({
                type: 'POST',
                url: 'busca_paciente',
                data: 'dato=' + dato,
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    $('#agrega-registros tbody').html(obj.response);
                }
            });
            return false;
        });
        $('body').on('click', '.registra-paciente', function (e) {
            var id = $(this).closest('tr').attr('data-dataid');
            $('#addpets')[0].reset();
            $.ajax({
                type: 'POST',
                url: 'get_pet_modal',
                data: 'id=' + id,
                success: function (data) {
                    try {
                        var r = jQuery.parseJSON(data);
                        if (r.data !== null) {

                            $("[name='petName']").val(r.data.petName);
                            $("[name='petSpecies']").val(r.data.petSpecies);
                            $("[name='petRace']").val(r.data.petRace);
                            $("[name='petGender']").val(r.data.petGender);
                            $("[name='petAge']").val(r.data.petAge);
                            $("[name='petColor']").val(r.data.petColor);
                            $("[name='petOwnerReg']").val(r.data.last_name);
                            $("[name='petHistory']").val(r.data.petHistory);
                            $("[name='petOwnerReg']").val(r.data.userId);
                            $(".pk_form").val(r.data.petsobjectId);
                        }
                    } catch (e) {
                        console.log(e);
                    }


                }
            });
            $('#registra-paciente').modal('toggle');

        });

        $('body').on('click', '#nuevo-paciente', function (e) {
            $('#registra-paciente').modal('toggle');

        });
        $('body').on('click', '#elimina_paciente', function (e) {

            var id = $(this).attr('data-objectid');
            $.ajax({
                type: 'POST',
                url: 'delete_pets',
                data: 'id=' + id,
                success: function (registro) {
                    var obj = jQuery.parseJSON(registro);
                    $('#confirmationModal').modal('hide');
                    $('#agrega-registros tbody').html(obj.response);
                    return false;
                }
            });

        });

        $("#addpets").validate({
            rules: {
                petName: {
                    required: true
                }, petSpecies: {
                    required: true
                }, petRace: {
                    required: true
                }, petGender: {
                    required: true
                }, petAge: {
                    required: true
                }, petColor: {
                    required: true
                }, petHistory: {
                    required: true
                }
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: 'POST',
                    url: $(form).attr("action"),
                    data: $(form).serialize(),
                    success: function (registro) {
                        var obj = jQuery.parseJSON(registro);
                        if (obj.data != null) {
                            $('#agrega-registros tbody').html(obj.data);
                        }
                        $('#addpets')[0].reset();
                        $('#registra-paciente').modal('toggle');
                        return false;

                    }
                });
            }
        });

        $("#fichaAtention").validate({
            rules: {
                petWeight: {
                    required: true
                }, petTemperature: {
                    required: true
                }, petHeartRate: {
                    required: true
                }, petBreathingFrecuency: {
                    required: true
                }, petPulse: {
                    required: true
                }, Responsable_doc: {
                    required: true
                }, userid: {
                    required: true
                }
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: 'POST',
                    url: $(form).attr("action"),
                    data: $(form).serialize(),
                    success: function (registro) {
                        $('#anamnesis').modal('toggle');
                        $("#lstmedicament").multiselect("refresh");
                        return false;

                    }
                });
            }
        });
        $("#historialform").validate({
            rules: {
                petObservationHistory: {
                    required: true
                }
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: 'POST',
                    url: $(form).attr("action"),
                    data: $(form).serialize(),
                    success: function (registro) {
                        $('#historial').modal('toggle');
                        return false;

                    }
                });
            }
        });





    }
///////////////////////////////////////////////////////////////////////////////
    function reloadUserManageReservationTable() {
        $.ajax({
            url: 'manageReservation',
            success: function (data) {
                $("#userManageReservation").html($(data).find("#userManageReservation").html());
            }
        });
    }

    //FIX FOR BS3 Alert dismissable
    $("body").on("click", ".alert .close", function (e) {
        $(this).closest("." + $(this).attr("data-hide")).hide();
    });

    $('body').on('click', '.searchManageUser', function (e) {
        $.ajax({
            method: "POST",
            url: 'admin/searchUsers',
            data: {
                'userEmailSearch': $(".searchManageUserText").val()
            },
            success: function (data, status, jqXHR) {
                $("#adminUsersTable").html($(data).find("#adminUsersTable").html());
            }
        });
    });


    $('body').on('click', '.searchUserServices', function (e) {
        if ($('input[name=sortService1]:checked').val() == "S") {
            console.log("Surgery");
            $.ajax({
                method: "POST",
                url: 'user/searchUserServices',
                data: {
                    'userEmailSearch': $(".searchUserServicesText").val(),
                    'serviceSort': "S"
                },
                success: function (data, status, jqXHR) {
                    $("#userReserve table").html($(data).find("#userReserve table").html());
                }
            });
        } else if ($('input[name=sortService1]:checked').val() == "O") {
            console.log("Others");
            $.ajax({
                method: "POST",
                url: 'user/searchUserServices',
                data: {
                    'userEmailSearch': $(".searchUserServicesText").val(),
                    'serviceSort': "O"
                },
                success: function (data, status, jqXHR) {
                    $("#userReserve table").html($(data).find("#userReserve table").html());
                }
            });
        } else {
            console.log("All");
            $.ajax({
                method: "POST",
                url: 'user/searchUserServices',
                data: {
                    'userEmailSearch': $(".searchUserServicesText").val(),
                    'serviceSort': ""

                },
                success: function (data, status, jqXHR) {
                    $("#userReserve table").html($(data).find("#userReserve table").html());
                }
            });
        }
    });

});

function resetReservationModal(modalName) {
    $(".reserveDate").text("");
    $(".reserveTime").text("");
    $('#datepicker').datepicker('setDate');
    $('.reserveTimeSelect').prop('selectedIndex', 0);
    $('' + modalName + ' .alert').hide();
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function numeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [0];

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function cargaDatosMascotaFicha(NombreMascota, IdMascota) {

    $('#mascota-ficha').val(NombreMascota);
    $('#mascota-id').val(IdMascota);

}

function hola() {
    $.ajax({
        type: 'POST',
        url: 'agrega_fichamascota',
        data: $('#formulario2').serialize(),
        success: function (data) {
            var obj = jQuery.parseJSON(data);
            if (data !== null) {
                $('#agrega-registros tbody').html('');
                $('#formulario2')[0].reset();
                $('#agrega-registros tbody').html(obj.response);
                $('#registra-paciente').modal('hide');
                return false;
            } else {
                console.log('sin datos');
            }
        }
    });
    return false;
}

function rebuildReservation() {
    $("body").on("click", ".addReservation", function (e) {
        $("#myModal #myModalLabel").text($(this).parent().parent().children('.serviceTitle').text());
        $(".submitReservation").attr("data-objectId", $(this).attr("data-objectId"));
        $("#myModal").modal();

    });
    $(".petNameUser").text('');
    $(".reserveDate").text('');
    $(".reserveTime").text('');
    $('#myModal').on('hidden.bs.modal', function () {
        resetReservationModal("#myModal");
    });
    $("[name='PetsId']").on('change', function () {
        if ($(this).val() != "Seleccione un Paciente") {
            $(".petNameUser").text($("[name='PetsId'] option:selected").text());
        } else {
            $(".petNameUser").text('');
        }
    });
    $("body").on("change", ".reserveTimeSelect", function (e) {
        if ($(this).val() != 0) {
            $(".reserveTime").text($(".reserveTimeSelect option:selected").text());
        }
    });
    $("#datepicker").datepicker({
        onSelect: function (date, obj) {
            if ($(".reserveDate").length) {
                $(".reserveDate").text(date);
            }
        },
        minDate: '0'
    });
}

/* 
 Detalles de página pe ile
 1. Entregar alerta de medicamentos prohibidos para el animal, ficha atención cliente ->
 campo observaciones
 
 2. Crear un formulario para ingresar recetas y mostrar PDF del formulario (en este punto
 muestra alerta de medicamentos prohibidos por el veterinario).
 Para crear nueva receta insertar un botón en listados de mascotas con su respec vo modal
 para registrar.
 
 3.Usar botón órdenes para mostrar en listado las fichas clínicas y con un botón mostrar pdf
 de la ficha (reporte para imprimir) libre diagramación.
 
 4.Hacer que las fichas de atención y fichas clínicas registren, editen y eliminen.
 
 5.Inicio sesión, mostrar usuario logueado en su sesión mientras esté conectado y guardar
 sesión en bd una vez desconectado mostrando hora y fecha.
 
 6.Campo Rut, colocar maskedtextbox (mascara de texto).
 
 7.Usuario debe poder resetear su contraseña
 
 8.Agregar olvido su contraseña y confirmar cambio por correo
 
 9.Poder desac var usuario sin borrar y colocar una observación (ej. Administrador que
 llevaba las platas fue despedido)
 
 10.Separar rut y correo en el campo email al editar usuario
 
 11.Servicios que se deben montar para el usuario solo debe ser urgencias, consultas y
 peluquería, solo estos que se muestran en admin (usuario) deben ser usados para
 hospitalizaciones
 
 12.Realizar sistema de toma de horas mostrando disponibilidad de horario.
 
 13.En facturación debe asociar en nombre de la mascota al cliente, ya que en este momento
 puede agregar manual.
 */