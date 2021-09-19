<div class="autoLike container">
    <div class="row" id="form1">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <p class="HuongDan">Tool giúp bạn <b>LIKE cùng một lúc nhiều bài viết</b> trên trang chủ (newsfeed). 
            Phù hợp với những bạn không có nhiều thời gian online Facebook nhưng vẫn muốn giữ tương tác tốt với bạn bè! 
            <form>
                <div class="form-group">
                    <label for="token">Nhập Token:</label>
                    <input id="token" type="text" class="form-control" placeholder="Token">
                </div>
                <div class="form-group">
                    <label for="number">Nhập số lượng bài viết muốn reaction cùng một lúc:</label>
                    <input id="soLuong" type="number" class="form-control" placeholder="Số lượng">
                </div>
                <div class="form-group">
                    <label for="SoLuong">Cảm xúc:</label>
                    <input class="form-check-input" style="margin-left: 20px" type="radio" value="LIKE" name="radio" id="radio" checked>
                    <label class="form-check-label" style="padding-left: 40px">LIKE</label>
                    <input class="form-check-input" style="margin-left: 20px" type="radio" value="LOVE" name="radio" id="radio">
                    <label class="form-check-label" style="padding-left: 40px">LOVE</label>
                    <input class="form-check-input" style="margin-left: 20px" type="radio" value="HAHA" name="radio" id="radio">
                    <label class="form-check-label" style="padding-left: 40px">HAHA</label>
                    <input class="form-check-input" style="margin-left: 20px" type="radio" value="WOW" name="radio" id="radio">
                    <label class="form-check-label" style="padding-left: 40px">WOW</label>
                    <input class="form-check-input" style="margin-left: 20px" type="radio" value="ANGRY" name="radio" id="radio">
                    <label class="form-check-label" style="padding-left: 40px">ANGRY</label>
                </div>
                <button class="btn btn-dark" type="button" onclick="reaction()">Thực hiện</button>
            </form>
        </div>	
        <div class="col-md-3"></div>
        <br/>
    </div>
    <!--Ajax return values to class "content"-->
    <div id="alert_popover">
        <div class="wrapper">
            <div class="result">
            </div>
        </div>
    </div>
</div>