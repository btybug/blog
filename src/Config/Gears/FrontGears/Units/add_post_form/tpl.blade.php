<div class="container">
    <div class="add-post-form">
        <h3 class="inner-tittle">Add Post </h3>
        <div class="grid-1">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Post Title</label>
                    <div class="col-sm-10">
                        <div class="input-group">
																												<span class="input-group-addon">
																													<i class="fa fa-user"></i>
																												</span>
                            <input type="text" class="form-control1 icon"
                                   placeholder="Your name">
                            <span class="input-group-addon tooltip1">
                                <i class="fa fa-question"></i>
                                <span class="tooltiptext">Tooltip text</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Post Description</label>
                    <div class="col-sm-10">
                        <textarea name="txtarea1" cols="50"
                                  rows="4"
                                  class="form-control1" title="Enter your text here..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Post Images</label>
                    <div class="col-sm-10">
                        <input class="form-control1" name="image" type="file">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Post Status</label>
                    <div class="col-sm-10">
                        <select class="form-control1" name="status">
                            <option value="draft">Draft</option>
                            <option value="pending">Pending</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                </div>
                <div class="form-group button">
                    <button>Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{!! BBstyle($_this->path."/css/main.css") !!}