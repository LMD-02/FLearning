@extends('layout.master')
@push('css')

@endpush
@section('content')
    <div class="content-page" style="margin:0 10%;padding:0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Cơ sở dữ liệu - Chương 1</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xxl-8 col-lg-8">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="mt-0">Bài 1: Giới thiệu về hệ cơ sở dữ liệu</h3>

                                    <!-- project title-->
                                </div>
                                <div>
                                    <div class="single-content">
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Việc quản trị hệ cơ sở dữ liệu là cần thiết để giúp doanh nghiệp có thể sắp xếp, truy xuất các thông tin một cách hiệu quả. Tuy nhiên, vẫn có nhiều người khá mơ hồ với khái niệm này. Do đó, hãy cùng Daotaotester tìm hiểu chi tiết trong nội dung bài viết dưới đây.</span></p>
                                        <p style="text-align: center;"><img decoding="async" class="alignnone size-full wp-image-49273" src="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu.jpg.webp" alt="hệ cơ sở dữ liệu" width="800" height="534" srcset="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu.jpg.webp 800w, https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-768x513.jpg.webp 768w" sizes="(max-width: 800px) 100vw, 800px"></p>
                                        <h2 style="text-align: justify;"><span id="Dinh_nghia_he_co_so_du_lieu">Định nghĩa hệ cơ sở dữ liệu</span></h2>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Cơ sở dữ liệu (Database) là một tập hợp các thông tin, dữ liệu được xây dựng theo một cấu trúc nào đó. Mục đích chính là để đáp ứng nhu cầu khai thác, sử dụng của con người hay chạy nhiều chương trình ứng dụng cùng lúc.&nbsp;</span></p>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Điểm khác biệt của cơ sở dữ liệu so với việc lưu file thông thường nằm ở tính cấu trúc sắp xếp có hệ thống. Các thông tin đầu vào sẽ được phân thành nhiều trường theo một trật tự nhất định. Ưu điểm của cách sắp xếp này là giúp giảm khả năng trùng lặp thông tin; dễ dàng tìm kiếm và truy xuất theo nhiều cách với khả năng chia sẻ hiệu quả.&nbsp;</span></p>
                                        <p style="text-align: center;"><img decoding="async" loading="lazy" class="alignnone size-full wp-image-49274" src="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-1.jpg.webp" alt="Định nghĩa hệ cơ sở dữ liệu" width="800" height="600" srcset="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-1.jpg.webp 800w, https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-1-768x576.jpg.webp 768w" sizes="(max-width: 800px) 100vw, 800px"></p>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Các cơ sở dữ liệu sau khi được tạo sẽ cần được lưu trữ lại và lúc này khái niệm hệ cơ sở dữ liệu được ra đời. Theo đó, hệ cơ sở dữ liệu là một chương trình phần mềm có nhiệm vụ chính là lưu trữ; hỗ trợ việc đọc, chỉnh sửa, thêm hay khôi phục thông tin một cách dễ dàng. Hệ thống tự động này sẽ gồm 2 thành phần chính là Bộ xử lý truy vấn và Bộ quản lý dữ liệu.</span></p>
                                        <h2 style="text-align: justify;"><span id="Chuc_nang_cua_he_quan_tri_CSDL">Chức năng của hệ quản trị CSDL</span></h2>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Việc sử dụng hệ quản trị CSDL sẽ mang đến nhiều lợi ích bất ngờ cho người dùng. Nguyên nhân là bởi chúng sở hữu những chức năng cơ bản sau:</span></p>
                                        <ul style="text-align: justify;">
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Cung cấp cách tạo lập CSDL. Người dùng được cung cấp công cụ để tạo lập, khai báo thông tin. Từ đó mới có thể sắp xếp và lưu trữ một cách có hệ thống.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Cung cấp cách cập nhật dữ liệu (Thêm, sửa, xóa), tìm kiếm và kết xuất thông tin.&nbsp;</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">Cung cấp công cụ kiểm soát điều khiển việc truy cập vào CSDL. Cụ thể: Đảm bảo an ninh, phát hiện và ngăn chặn truy cập không được cho phép. Bên cạnh đó, hệ quản trị CSDL còn duy trì tính nhất quán của dữ liệu; điều khiển các hoạt động truy cập. Khôi phục dữ liệu khi chẳng may xảy ra các sự cố và quản lý các mô tả dữ liệu.</span></li>
                                        </ul>
                                        <h2 style="text-align: justify;"><span id="Cau_truc_cua_he_quan_tri_co_so_du_lieu">Cấu trúc của hệ quản trị cơ sở dữ liệu</span></h2>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Một hệ quản trị cơ sở dữ liệu sẽ bao gồm những thành phần cơ bản dưới đây:</span></p>
                                        <ul style="text-align: justify;">
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Dữ liệu, siêu dữ liệu</strong>: Dữ liệu đầu vào để bắt đầu tạo tập; khai báo thành hệ thống cơ sở dữ liệu.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Bộ quản lý lưu trữ</strong>: Nhiệm vụ chính là để lưu trữ và truy xuất dữ liệu khi có yêu cầu. Bộ quản lý lưu trữ sẽ tổ chức để tối ưu dữ liệu và tương tác với bộ quản lý tệp một cách hiệu quả.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Bộ xử lý câu hỏi</strong>: Khi có yêu cầu cần truy vấn, bộ xử lý câu hỏi sẽ tìm kiếm dữ liệu để đưa ra kết quả. Sau đó biến đổi các câu hỏi thành yêu cầu có thể thực hiện được. Đồng thời lựa chọn một kết quả tốt nhất để trả lời cho các truy vấn.&nbsp;</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Bộ quản lý giao dịch</strong>: Trách nhiệm của bộ quản lý giao dịch là đảm bảo tính toàn vẹn của hệ thống. Điều đó có nghĩa là nó cần đảm bảo các thao tác được thực hiện đồng thời không xảy ra xung đột; không làm ảnh hưởng đến hệ thống. Tương tác với bộ xử lý câu hỏi để điều phối các hoạt động. Bên cạnh đó, tương tác với bộ quản lý lưu trữ để lưu lại các thay đổi để thực hiện lại khi cần.</span></li>
                                        </ul>
                                        <h2 style="text-align: justify;"><span id="Quan_tri_co_so_du_lieu_la_gi">Quản trị cơ sở dữ liệu là gì?</span></h2>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Quản trị cơ sở dữ liệu Database Management System bao gồm một hệ thống phần mềm tự động nhằm xác định; quản lý và truy xuất dữ liệu. Trong đó sẽ có các quy tắc phục vụ cho việc thao tác một cách hiệu quả hơn.</span></p>
                                        <p style="text-align: center;"><img decoding="async" loading="lazy" class="alignnone size-full wp-image-49275" src="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-2.jpg.webp" alt="Quản trị cơ sở dữ liệu là gì?" width="800" height="450" srcset="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-2.jpg.webp 800w, https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-2-768x432.jpg.webp 768w" sizes="(max-width: 800px) 100vw, 800px"></p>
                                        <h3 style="text-align: justify;"><span id="Tai_sao_phai_quan_ly_co_so_du_lieu">Tại sao phải quản lý cơ sở dữ liệu?</span></h3>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Quản trị cơ sở dữ liệu có thể coi là xương sống kết nối tất cả phân đoạn của vòng đời thông tin. Nguyên nhân là bởi:</span></p>
                                        <ul style="text-align: justify;">
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Dữ liệu là tài sản vô giá của doanh nghiệp.</strong>&nbsp;Dữ liệu sẽ là cơ sở để doanh nghiệp có thể phân tích và đưa ra các quyết định kinh doanh sáng suốt. Mục tiêu hướng đến là tối ưu hóa quy trình nhằm gia tăng doanh thu và lợi nhuận. Tuy nhiên, nếu không biết cách sắp xếp, tổ chức hiệu quả thì doanh nghiệp sẽ không thể khai thác hết tài nguyên hiện có.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Khối lượng dữ liệu ngày càng lớn và khó quản lý.</strong>&nbsp;Đây là bài toán khó nhằn của hầu hết doanh nghiệp. Nhất là với các tổ chức có quy mô lớn như các tập đoàn đa quốc gia. Họ sẽ phải quản lý một lượng dữ liệu khổng lồ nên càng cần có hệ quản trị tối ưu.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Tránh vi phạm quyền riêng tư.</strong>&nbsp;Điều này sẽ giúp doanh nghiệp không vướng phải những vấn đề liên quan đến quyền riêng tư cá nhân hay quyền riêng tư dữ liệu. Tránh việc rơi vào các tình thế nguy hiểm về mặt pháp lý có thể gây tổn thất không mong muốn.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Thảm họa mất dữ liệu có thể khiến công ty sụp đổ</strong>. Điều này đã được minh chứng qua thông tin của Cục Lưu trữ &amp; Hồ sơ Quốc gia Mỹ. Họ cho biết có đến 93% công ty nộp đơn xin phá sản khi bị mất trung tâm dữ liệu từ 10 ngày trở lên. Điều đó càng cho thấy tầm quan trọng của việc quản lý dữ liệu trong thời buổi cạnh tranh như hiện tại.</span></li>
                                        </ul>
                                        <h3 style="text-align: justify;"><span id="Y_nghia_cua_quan_ly_co_so_du_lieu">Ý nghĩa của quản lý cơ sở dữ liệu</span></h3>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Thực tế là quản lý cơ sở dữ liệu mang đến cho doanh nghiệp rất nhiều lợi ích to lớn. Cụ thể:</span></p>
                                        <ul style="text-align: justify;">
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Truy cập thông tin nhanh hơn.</strong>&nbsp;Khi có hệ cơ sở dữ liệu, nhân viên trong công ty sẽ dễ dàng tìm kiếm truy xuất thông tin cần một cách nhanh chóng. Nâng cao hiệu quả kết nối các nhiệm vụ với các chức năng ở nhiều phòng ban.&nbsp;</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Giúp tiết kiệm chi phí.</strong>&nbsp;Các nhiệm vụ, công việc đều được báo cáo trên một hệ cơ sở dữ liệu. Điều đó giúp giảm thiểu sự trùng lặp không cần thiết, giảm lượng giấy tờ cần lưu trữ.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Ngăn chặn việc mất dữ liệu.</strong>&nbsp;Các thông tin quan trọng có thể ẩn chứa bí quyết kinh doanh của một doanh nghiệp. Thậm chí ảnh hưởng đến sự sống còn của công ty. Bởi vậy việc quản lý dữ liệu lại càng trở nên cần thiết hơn. Doanh nghiệp sẽ phải có những biện pháp nhất định để đảm bảo thông tin quan trọng sẽ được sao lưu lại. Ngăn chặn việc truy cập từ các nguồn thứ cấp không rõ nguồn gốc.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Giảm thiểu rủi ro bảo mật.</strong>&nbsp;Quản lý hệ cơ sở dữ liệu đúng cách sẽ khiến kẻ xấu khó lòng đánh cắp thông tin quan trọng.</span></li>
                                            <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;"><strong>Giúp tăng hiệu quả kinh doanh.</strong>&nbsp;Một doanh nghiệp muốn thành công nhanh chóng thì họ cần phải biết cách chớp lấy thời cơ. Bởi vậy nên việc nắm bắt thông tin từ hệ thống quản trị CSDL sẽ là cơ sở để đưa ra các định hướng đúng đắn. Đòi hỏi doanh nghiệp cần phải phản ứng nhanh nhạy với các biến động từ thị trường cũng như hành động của đối thủ.</span></li>
                                        </ul>
                                        <h3 style="text-align: justify;"><span id="Top_5_he_quan_tri_CSDL_pho_bien">Top 5 hệ quản trị CSDL phổ biến</span></h3>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Để quản lý dữ liệu một cách hiệu quả, các doanh nghiệp sẽ sử dụng các hệ quản trị cơ sở dữ liệu (CSDL). Dưới đây là 5 cái tên thường gặp và phổ biến nhất hiện nay.</span></p>
                                        <h4 style="text-align: justify;"><span id="He_quan_tri_CSDL_MySQL">Hệ quản trị CSDL MySQL</span></h4>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">MySQL là hệ quản trị CSDL phổ biến nhất dành cho các ứng dụng web. Ưu điểm của hệ thống này là có tốc độ cao, ổn định và rất dễ dùng. MySQL có tính khả chuyển, có thể hoạt động trên nhiều hệ điều hành từ Windows đến các dòng khác như Linux; Mac OS X; Unix,.. Cung cấp nhiều tiện ích phục vụ cho việc quản lý, truy vấn các dữ liệu. Nhất là với các ứng dụng có truy cập CSDL trên internet.</span></p>
                                        <p style="text-align: center;"><img decoding="async" loading="lazy" class="alignnone size-full wp-image-49276" src="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-3.jpg.webp" alt="Hệ quản trị CSDL MySQL" width="800" height="400" srcset="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-3.jpg.webp 800w, https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-3-768x384.jpg.webp 768w" sizes="(max-width: 800px) 100vw, 800px"></p>
                                        <h4 style="text-align: justify;"><span id="He_quan_tri_CSDLOracle">Hệ quản trị CSDL&nbsp;Oracle</span></h4>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Oracle có tên đầy đủ là Oracle database, được dùng để tính toán Grid Computing và Data Warehousing là chủ yếu. Oracle được dùng như một công cụ hỗ trợ cho <a href="https://daotaotester.com/tam-quan-trong-cua-sql-doi-voi-tester/" target="_blank" rel="noopener"><em>SQL</em></a> trong việc truy vấn và tương tác với Database.&nbsp;</span></p>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Có rất nhiều phiên bản từ miễn phí đến trả phí cho doanh nghiệp lựa chọn theo mục đích và nhu cầu. Trong phiên bản cập nhật mới nhất, Oracle đã tích hợp thêm trình quản lý dữ liệu đám mây. Điều này đã giúp cho người dùng có thể lưu trữ hàng tỷ bản Record mà không cần tốn bộ nhớ trong. Tuy nhiên, Oracle có một nhược điểm khá lớn. Hệ thống cơ sở dữ liệu Oracle khá phức tạp và thường chiếm nhiều tài nguyên trên máy tính. Vì vậy đã gây ra một số phiền toái nhất định cho người dùng. Đòi hỏi họ cần nâng cấp phần cứng trước khi sử dụng các công cụ đang được hỗ trợ.</span></p>
                                        <p style="text-align: center;"><img decoding="async" loading="lazy" class="alignnone size-full wp-image-49277" src="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-4.jpg.webp" alt="Hệ quản trị CSDL&nbsp;Oracle" width="800" height="440" srcset="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-4.jpg.webp 800w, https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-4-768x422.jpg.webp 768w" sizes="(max-width: 800px) 100vw, 800px"></p>
                                        <h4 style="text-align: justify;"><span id="He_quan_tri_CSDL_SQL_Server">Hệ quản trị CSDL SQL Server</span></h4>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Cũng là một trong những hệ quản trị CSDL phổ biến, SQL Server được thiết kế để chạy trên môi trường dữ liệu lớn với sự ổn định và khả năng truy cập nhanh. SQL Server có thể kết hợp với các Sever khác cùng lúc để phục vụ cho hàng ngàn User. Từ đó giúp tiết kiệm chi phí một cách tối ưu nên được nhiều doanh nghiệp tin dùng. Đặc biệt, SQL Server còn giúp bảo mật dữ liệu khi chỉ cho phép những người ủy quyền được xem thông tin cơ mật.</span></p>
                                        <p style="text-align: center;"><img decoding="async" loading="lazy" class="alignnone size-full wp-image-49278" src="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-5.jpg.webp" alt="Hệ quản trị CSDL SQL Server" width="800" height="437" srcset="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-5.jpg.webp 800w, https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-5-768x420.jpg.webp 768w" sizes="(max-width: 800px) 100vw, 800px"></p>
                                        <h4 style="text-align: justify;"><span id="He_quan_tri_CSDL_NoSQL">Hệ quản trị CSDL NoSQL</span></h4>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">Không giống những người đàn anh bên trên, NoSQL lại nhấn mạnh đến mô hình lưu trữ cặp giá trị – khóa và hệ thống lưu trữ phân tán. Vì quản trị dữ liệu không quan hệ là chủ yếu nên NoSQL có tính linh hoạt cao. Được ứng dụng cho các kho dữ liệu lớn khi cần lưu trữ.</span></p>
                                        <p style="text-align: center;"><img decoding="async" loading="lazy" class="alignnone size-full wp-image-49279" src="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-6.jpg.webp" alt="Hệ quản trị CSDL NoSQL" width="800" height="457" srcset="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-6.jpg.webp 800w, https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-6-768x439.jpg.webp 768w" sizes="(max-width: 800px) 100vw, 800px"></p>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">NoSQL có ưu điểm là sở hữu tốc độ phát triển cơ sở dữ liệu nhanh. Cho phép phân tán dữ liệu theo chiều ngang trên nhiều server nên có thể xử lý được lượng lớn thông tin.&nbsp;</span></p>
                                        <h4 style="text-align: justify;"><span id="He_quan_tri_CSDL_MongoDB">Hệ quản trị CSDL MongoDB</span></h4>
                                        <p style="text-align: justify;"><span style="font-weight: 400;">MongoDB cũng được biết đến là một hệ cơ sở dữ liệu phi quan hệ với mã nguồn mở. Đây là một công cụ có tính linh hoạt cao, hoạt động thông qua việc kết nối trong một trình điều khiển có tên MongoDB. Ưu điểm là có tốc độ truyền phát nhanh và sử dụng đơn giản. Có công cụ hỗ trợ JSON với khả năng mở rộng linh hoạt. Tuy nhiên, công cụ này cũng có những điểm yếu nhất định. Khi thao tác, người dùng phải hết sức cẩn thận bởi MongoDB không có tính ràng buộc như với cơ sở dữ liệu quan hệ. Bên cạnh đó, dữ liệu được lưu dưới dạng Key-value nên khá tốn bộ nhớ.</span></p>
                                        <p style="text-align: center;"><img decoding="async" loading="lazy" class="alignnone size-full wp-image-49280" src="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-7.jpg.webp" alt="Hệ quản trị CSDL MongoDB" width="800" height="426" srcset="https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-7.jpg.webp 800w, https://daotaotester.com/wp-content/uploads/2022/11/he-co-so-du-lieu-7-768x409.jpg.webp 768w" sizes="(max-width: 800px) 100vw, 800px"></p>
                                        <p>Như vậy là chúng ta đã cùng tìm hiểu khái niệm hệ cơ sở dữ liệu cũng như những nội dung liên quan. Hy vọng chia sẻ của Daotaotester sẽ giúp bạn có một cái nhìn toàn diện hơn và biết cách sử dụng các công cụ một cách hiệu quả.</p>
                                        <blockquote>
                                            <p>Nhận ngay ưu đãi lên đến 20 % học phí khi đăng ký <a href="https://daotaotester.com/" target="_blank" rel="noopener"><em>Khóa học tester</em></a> trong tháng này!</p>
                                        </blockquote>

                                        <p></p>



                                    </div>
                                </div>





                            </div> <!-- end card-body-->

                        </div> <!-- end card-->

                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 mb-3">Bình luận (258)</h4>

                                <textarea class="form-control form-control-light mb-2" placeholder="Write message" id="example-textarea" rows="3"></textarea>
                                <div class="text-end w-100 d-flex justify-content-end" style="">
                                    <div class="btn-group mb-2 ms-2">
                                        <button type="button" class="btn btn-primary btn-sm">Gửi bình luận</button>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mt-2 flex-column">

                                    <div class="w-100 overflow-hidden mt-2">
                                        <h5 class="mt-0">Lê Thị A</h5>
                                       Bài học rất bổ ích, phù hợp

                                    </div>

                                    <div class="w-100 overflow-hidden mt-2">
                                        <h5 class="mt-0">Lê Thị B</h5>
                                        Bài học dễ hiểu , phù hợp

                                    </div>
                                </div>

                                <div class="text-center mt-2">
                                    <a href="javascript:void(0);" class="text-danger">Load more </a>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div>

                    <div class="col-lg-4 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Các bài khác</h5>
                                <div dir="ltr">
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                            <span class="avatar-title rounded" style="    background-color: rgb(66,210,157);">
                                                                Bài 2
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">Giới thiệu về hệ csdl</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                            <span class="avatar-title rounded" style="    background-color: rgb(66,210,157);">
                                                                Bài 2
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">Giới thiệu về hệ csdl</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                            <span class="avatar-title rounded" style="    background-color: rgb(66,210,157);">
                                                                Bài 2
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">Giới thiệu về hệ csdl</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end card-->

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Files</h5>

                                <div class="card mb-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                            <span class="avatar-title rounded">
                                                                .ZIP
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">data.zip</a>
                                                <p class="mb-0">2.3 MB</p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                            <span class="avatar-title rounded">
                                                                .JPG
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">image.jpg</a>
                                                <p class="mb-0">3.25 MB</p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-0 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                            <span class="avatar-title text-bg-secondary rounded">
                                                                .MP4
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">video.mp4</a>
                                                <p class="mb-0">7.05 MB</p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row-->


            </div> <!-- container -->

        </div> <!-- content -->



    </div>
@endsection()
