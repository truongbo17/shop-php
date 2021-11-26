13/11/2021
Phân tích hệ thống WEB Thương mại điện tử
-chức năng admin : thêm sửa xóa,check đơn hàng....
-chức năng người dùng: mua hàng,sửa profile,...

Thiết kế database:
+table role: quyền admin,user,khách
+table user: thông tin,khóa phụ role_id->role
+table token: lưu token user login,khóa phụ user_id->user
+table category:lưu thông tin danh mục,đường dẫn,parent_id dùng check thư mục con,user_id->user để biết ai đăng
+table product:lưu thông tin sản phẩm,đường dẫn,khóa phụ user_id->user để biết ai đăng,quantily số lượng nhập,sold: số lượng bán-> mỗi lần order thành công sẽ +1;
+table product_category: product_id->product,category_id->category,mục đích set nhiều danh mục cho sản phẩm
+table galery_product: product_id->product lưu nhiều ảnh của sản phẩm đó
+table shipping: lưu các cách thanh toán
+table order:lưu thông tin người mua hàng,nếu đã đăng nhập->có user_id->role_id->tự động fill dữ liệu vào form.Nếu chưa đăng nhập thì để trống role_id->khách,tụ nhập vào form
+table order_detail:lưu danh sách sản phẩm mua hàng,order_id->order xem ai mua hàng, product_id->product,sản phẩm mua là gì
+table feedback: lưu thông tin phản hồi...
+table category_post: danh mục bài viết
+table post: bài viết;
+tabele post_category: lưu nhiều danh mục bài viết
+table comment:lưu comment bài viết,và sản phẩm

Xây dựng Khung chương trình
-các thư viện insert update...liên quan đến truy vấn database
-thư viện utility liên quan đến upload images,fix SQL injection...

Xây dựng trang Admin
-Trang index(chủ yếu là thống kê)
-Trang User:
+trạng thái(deleted->user): 0: bình thường,1: cấm(xóa),2:Cảnh báo vi phạm,4:Khách hàng thân thiết
+jquery ajax để Cấm user(tại index user):index user->dùng jquery để thêm các thuộc tính và reload lại trang sau 5s
+Xây dựng trang chi tiết User->chỉnh sửa user(có update avatar)/ ko dùng ajax được vì không upload được avtar bằng ajax(chưa tối ưu được)
+thêm user -> ajax
+chức năng reset lại pass cho user(pass=>123456)

-Xây chức năng session login admin->login success -> tạo ra token lưu vào database và lưu xuống cookie
-Chức năng logout->Xóa session và và cookie (sau này update sẽ giữ lại sesion trong database để đọc log)
=>OK


=>chuyển 1 số trang về ajax xml(fix dc upload ảnh bằng xml ajax)

14/11/2021

-Trang Category
danh mục(chỉ ẩn hiện->không xóa)

-index->show list(dùng đệ quy xử lý danh mục con)
-view category ->view chi tiết và sửa xóa(ẩn) 

-parent_id = 0 : danh mục gốc(cha)
-parent_id = id : danh mục con tương ứng của id danh mục cha

hàm data_tree(xuất ra danh mục đa cấp)
-foreach qua data đc truyền vào
-check nếu data[parentid] = parentid đc truyền vào thì lưu vào mảng result
-child sẽ đệ quy hàm data_tree với data được truyền vào lúc ban đầu,parentid = data[id] => mục đính tìm các danh mục con của danh mục parentid đc truyền vào lúc đầu
-sáp nhập mảng child với result bằng array_merge
-tạo biến level để hiển thị

->Xong danh mục sản phẩm(thêm sửa xóa,danh mục đa cấp...)

-TRang Product.
0:bình thường,1:cảnh bảo vi phạm,2 bị ấn(xóa),3 nổi bật;
index -> view một vài cái...
ảnh được lưu trong 1 table riêng gọi qua forgen key 

gọi từng table liên quan với product (ko sao vì load 1 sản phẩm)

/15/11/2021

11 màu: xanh lam => 1,xanh lục=>2, đỏ=>3, tím=>4, vàng=>5, hồng=>6, nâu=>7, đen=>8, trắng=>9,xám=>10,cam=>11
5 size:1->X,2->M,3->L,4->XL,5->XXL
fix lại ảnh hiển thị trong phần view product admin

=>fix được slide ảnh
=>fix đc đổ dữ liệu ra phần edit
=>fix được cái size(insert size)=>làm dc color=>làm đc prodcut categroy...

=>Cần fix edit product:
-color(OK)
-delete comment(OK)
-upload multi image using ajax(xong)
-fix <br /> <b>Notice</b>: Array to string conversion in <b>C:\xampp\htdocs\shop\process\process-ajax-product.php</b> on line <b>107</b><br /> success(đã fix)
-fix lại đường dẫn (OK)
-thêm category product(xong)

16/11/2021

-fix lại color,category,size trong product-ajax-process $_POST['upload'] (ok)
-fix lại category(xóa-liên kết đến bảng product)(OK)
-thêm category có thể xóa(OK)

-thêm product (OK)

-Mã giảm giá(OK)/admin
-pay/shipping(OK)
-comment(OK)
-phản hồi(OK)

_QUẢN LÝ ĐƠN HÀNG,BÀI VIẾT

thêm danh mục bài viết(ok)
thêm bài viết(OK)
view list,view chi tiết,edit(OK)

17/11
-Quản lý đơn hàng

status => order
0 : chờ xác nhận
1 : xác nhận
2 : đang giao
3 : đã giao
4 : bị hủy

order_shipping
0:internetbanking
1:thanh toán atm
2:thanh toán khi nhận hàng
4:chuyển khoản


Chi tiết đơn hàng(OK)
chang status order(OK)
check tồn kho(OK)

-Trang index->thống kê

TRANG CHỦ(user)
feedback->xong
about,các dùng(xong)

index 
hiện thị giá sau khi giảm,giá gốc,hết hàng khi số lượng = 0
-index hiển thị thêm bài viết mới ...

thêm ảnh đại diện cho post(bỏ,mất thời gian->chức năng phụ)

18/11
-cần hiển thị HẾT HÀNG
giảm dung lượng=>tăng tốc độ load
bỏ jquery ở footer để tăng tốc độ load-> có thể thêm lại nếu thiếu


19/11 thêm giỏ hàng,thanh toán...

coupon:0,không có,1 là có

20/11:category,bài viết=>rewrite url