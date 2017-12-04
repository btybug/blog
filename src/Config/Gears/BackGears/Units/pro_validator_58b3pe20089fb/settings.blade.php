<link>
<div class="row">
    <!-- Select Basic -->
    <div class="form-group m-t-10">
        <div class="col-md-6">
            <div class="col-md-12">
                <label class="col-md-5 control-label" for="selectbasic">Select Validations</label>
                <div class="col-md-7">
                    <select id="pro_validation_rules_groups" name="pro_validation_rule" class="form-control">
                        <option value="0">Select Rule</option>
                        <option value="number_of_input">Number of input</option>
                        <option value="must_contain">Must contain</option>
                        <option value="starts_with">Starts with</option>
                        <option value="ends_with">Ends with</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 pro_validation_rules_group_place">

            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12" id="pro_validator_settings_area"
                 style="min-height: 320px;background: white;color: #0a0a0a">
                Area for rule attributes
            </div>
        </div>

    </div>

    <div class="form-group m-t-10">
        <div class="col-md-12">
            <ul id="myTags">
                <!-- Existing list items will be pre-added to the tags -->
            </ul>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $("#myTags").tagit({
            fieldName: "skills"
        });
    })
</script>
{!! Html::script($_this->path.'/js/validator.js') !!}
