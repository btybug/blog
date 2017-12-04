$(document).ready(function () {
    var dd = console.log;
    var addButton = '<div class="form-group"><label class="col-md-4 control-label" for="singlebutton"></label><div class="col-md-4"><button   class="btn btn-primary pro_add_rule_button">add rule</button> </div></div>'

    function sendajaxvar(url, data, success) {
        $.ajax({
            type: "post",
            datatype: "json",
            url: url,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (success) {
                    success(data);
                }
                return data;
            }
        });
    };
    var rule = '';
    $('#pro_validation_rules_groups').on('change', function () {
        if ($(this).val() != 0) {
            var data = {"rule": $(this).val()};
            sendajaxvar('/admin/provalidator/get-rules-groups', data, function (request) {

                $('.pro_validation_rules_group_place').html(request.html);

            })

        } else {
            $('#pro_validator_settings_area').html('Area for rule attributes');
        }
    });

    $('body').on('change', '#pro_validation_rules', function () {
        if ($(this).val() != 0) {
            rule = $(this).val();
            var data = {"rule": $(this).val()};
            sendajaxvar('/admin/provalidator/get-rules-settings', data, function (request) {

                $('#pro_validator_settings_area').html(request.html + addButton);

            })

        } else {
            $('#pro_validator_settings_area').html('Area for rule attributes');
        }
    });
    $('body').on('click', '.pro_add_rule_button', function () {
        var attributes = $('body').find('[data-rule=' + rule + ']');
        var redyRule = rule;
        if (attributes.length) {
            redyRule = redyRule + ':';
            $.each(attributes, function (k, v) {
                if (attributes.length != (k + 1)) {
                    redyRule = redyRule + $(v).val() + ',';
                } else {
                    redyRule = redyRule + $(v).val();
                }
            });
        }
        $("#myTags").tagit("createTag", redyRule);
    })
});
