<div class="container">
    <h1>Danh sách xe máy</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Biển số</th>
                <th>Hãng xe</th>
                <th>Model</th>
                <th>Màu sắc</th>
                <th>Số khung</th>
                <th>Số máy</th>
                <th>Chủ sở hữu</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($xeMays as $xeMay)
    <p>Tên xe: {{ $xeMay->hang_xe }}</p>
    <p>Chủ xe: {{ $xeMay->chuXe ? $xeMay->chuXe->ten_chu : 'Chưa có chủ' }}</p>
@endforeach
        </tbody>
    </table>
</div>
