-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2021 lúc 06:18 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `sodondh` int(11) DEFAULT NULL,
  `mshh` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `giadathang` int(11) DEFAULT NULL,
  `giamgia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`sodondh`, `mshh`, `soluong`, `giadathang`, `giamgia`) VALUES
(1, 1, 1, 3087500, NULL),
(2, 20, 1, 5985000, NULL),
(2, 13, 1, 6175000, NULL),
(2, 6, 1, 6125000, NULL),
(5, 1, 1, 3087500, NULL),
(6, 20, 1, 5985000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethanghoa`
--

CREATE TABLE `chitiethanghoa` (
  `mshh` int(11) DEFAULT NULL,
  `xuatxu` varchar(255) DEFAULT NULL,
  `namphathanh` year(4) DEFAULT NULL,
  `nhomhuong` varchar(255) DEFAULT NULL,
  `phongcach` varchar(255) DEFAULT NULL,
  `chitietsp` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethanghoa`
--

INSERT INTO `chitiethanghoa` (`mshh`, `xuatxu`, `namphathanh`, `nhomhuong`, `phongcach`, `chitietsp`) VALUES
(1, 'Pháp', 2018, 'Hương ambroxan, Cam bergamot, Hạt tiêu tứ xuyên', 'Phóng khoáng, Nam tính, Cuốn hút', 'Hương đầu: Cam bergamot.\r\n\r\nHương giữa: Oải hương, Tiêu, Hoa hồi, Nhục đậu khấu.\r\n\r\nHương cuối: Ambroxan, Vanilla.\r\n\r\nĐược ra mắt vào năm 2018 - không lâu sau sự thành công vang dội của Christian Dior Sauvage EDT - Dior Sauvage \r\nEDP xuất hiện với những cải tiến về mùi hương, hòa quyện về cảm xúc hơn cho người dùng.\r\n\r\nLấy ý tưởng từ những bối cảnh hoang dã nhất, Dior Sauvage EDP gói ghém tông hương thanh cay, mộc mạc mà chân \r\nthật trong mình. Bắt đầu bằng Cam chanh tươi mát, Dior Sauvage EDP không đơn giản chỉ dừng lại ở đó, mà tỉ mẩn \r\nlen lỏi dẫn dắt ta đến tầng hương thứ hai đầy mê hoặc với Oải hương, Tiêu và Nhục đậu khấu.\r\n\r\nTựa như một viên ngọc thô, Dior Sauvage EDP ánh lên nét quyến rũ hoang dại được đơm kết bởi hương hoa, kết hợp \r\nkhéo léo với chút cay nồng, ngọt nhẹ của gia vị, tạo nên nét nam tính, trưởng thành đến lạ.\r\n\r\nNhư đem ta trở về những ngày rong ruổi cắm trại trên bất kể nẻo đường, lửa trại đêm bùng lên tí tách từng vệt \r\nđỏ tía, Dior Sauvage EDP nhen nhúm cho ta sự tò mò, thích thú cùng ít nhiều niềm thỏa mãn được tận hưởng, được \r\nchinh phục, được yêu chính bản thân mình trong từng khắc.\r\n\r\nAmbroxan cùng Vanilla nhẹ nhàng ve vuốt khứu giác với vẻ dịu dàng, gọi mời khó cưỡng, hệt như những viên \r\nmarshmallow tan chảy, Dior Sauvage EDP sau lớp vỏ bọc vẫn là chàng trai ân cần với tông hương cuối ngọt xốp, \r\nmềm mại đầy quyến luyến.'),
(2, 'Pháp', 2014, 'Bưởi, Hương nhang, Hổ phách, Chanh vàng', 'Gợi cảm, Sang Trọng, Tinh tế, Lịch lãm', 'Hương đầu: Chanh vàng, Ớt hồng, Bạc hà.\r\n\r\nHương giữa: Dưa vàng, Hoa nhài, Gừng.\r\n\r\nHương cuối: Gỗ tuyết tùng, Hổ phách, Gỗ đàn hương.\r\n\r\nNước hoa Bleu de Chanel Eau de Parfum là bản nâng cấp của người đàn anh đi trước Bleu de Chanel Eau de \r\nToilette, ra đời vào mùa hè 2014, Jacques Polge đã không làm những fan nước hoa trung thành của nhà Chanel phải \r\nthất vọng. \"Nó còn hơn cả sự mong đợi của chúng tôi\" là câu nói hầu hết của những khách hàng may mắn đầu tiên \r\nsở hữu Bleu de Chanel Eau de Parfum tại Paris vào ngày ra mắt. So với bản gốc, Bleu de Chanel Eau de Parfum hể \r\nhiện sự nam tính một cách nổi bật hơn, với hương Chanh vàng, Ớt hồng, sự từng trải và tinh tế của một người đàn \r\nông dày dạn kinh nghiệm được bộc lộ một cách trực tiếp và rõ ràng hơn bao giờ hết. Kết thúc hương đầu với sự \r\nthanh mát của Bạc hà, là mùi của một người đàn ông manly vừa mới bước ra từ phòng tắm mát lạnh. Bleu de Chanel \r\nEau de Parfum khiến nhiều trái tim phải rung động với sự mạnh mẽ của Gừng, nhưng ẩn chứa sự lịch lãm của Hương \r\nhoa nhài quyện lẫn với Dưa vàng. Hãy thử tiến lại gần Bleu de Chanel Eau de Parfum để cảm nhận rõ sự nam tính \r\nđáng kinh ngạc đó vào cuối những buổi tiệc, khi Gỗ tuyết tùng và Hổ phách đã cám dỗ bạn bằng sự gần gũi và ấm \r\náp đến bất ngờ.'),
(3, 'Pháp', 1996, 'Hương biển, Quả chanh vàng, Quả chanh xanh, Cam bergamot, Hoa nhài, Quả cam', 'Hấp dẫn, Tươi mát, Nam tính, Tinh tế', 'Hương Đầu: Quả cam, Quả chanh xanh, Cam Bergamot, Quả chanh vàng.\r\nHương giữa: Hương nước biển, Quả đào, Hoa nhài, Hương Calone.\r\nHương cuối: Rêu sồi, Gỗ tuyết tùng, Xạ hương trắng.\r\n\r\nNước hoa Acqua di Gio của hãng Giorgio Armani được chuyên gia nước hoa Alberto Morillas tạo ra vào năm 1996,  \r\nvà có lẽ nó cũng là một trong những tác phẩm kinh điển nhất mà ông đã tạo ra. \"Giò trắng\", cái tên thân thuộc \r\nvà dễ thương mà những người yêu mến nước hoa trải qua nhiều thế hệ dành tặng cho chai nước hoa Acqua di Gio \r\ncùng với những câu chuyện và giai thoại về nó. Một chàng trai trong mơ xuất hiện với nụ cười tỏa nắng, mặc sơ \r\nmi trắng, cùng hương thơm quá đỗi \"gợi nhớ\" của Giorgio Armani Acqua di Gio khiến cô nàng nào đó thổn thức, nhớ \r\nnhung và đem cả khoảnh khắc đó vào giấc mơ, để rồi viết ra câu chuyện của mình trên mạng xã hội với mong muốn \r\ntìm kiếm sự trợ giúp cho bản thân mình, rằng chàng trai kia là ai, và mùi hương đó là gì. Cứ thế, mùi hương của \r\nAcqua di Gio được mặc định dành cho trai đẹp, và phải mặc sơ mi trắng, tựa như một chàng trai \"quốc dân\" trong \r\nlòng của những cô gái vậy. Giorgio Armani Acqua di Gio sở hữu note hương tươi mát của Nước biển, Chanh và Cam, \r\nbiến mọi không gian trở nên thư giãn, dễ chịu, cuốn hút mọi người bởi chính sự tinh tế, nam tính đầy chất tự \r\ndo, mạnh mẽ của đàn ông. Hoa nhài nằm ở midnote giúp chàng trai Acqua di Gio trở nên thân thiện và từ tốn, \r\ntrước khi hương thơm của xạ hương trắng và Gỗ tuyết tùng đánh gục mọi sự tò mò của đối phương, khiến họ nhớ \r\nnhung và không thể nào quên được. Giorgio Armani Acqua di Gio nhẹ nhàng, chân thật, tươi sáng và hiện đại, một \r\nngười đàn ông tự do, một người đàn ông luôn để lại sự nhớ nhung nhiều nhất cho mọi cô gái đã từng bước qua, dù \r\nchỉ là vô tình. '),
(8, 'Pháp', 2009, 'Bạch đậu khấu, Hoa oải hương, Gỗ tuyết tùng viginia', 'Nam tính, Gợi cảm, Cuốn hút', 'Hương đầu: Bạch đậu khấu.\r\nHương giữa: Cam Bergamot, Gỗ tuyết tùng, Lavender.\r\nHương cuối: Cỏ hương bài, Thì là Ba Tư.\r\n\r\nMột bản nhạc không lời được mở bằng chiếc bằng radio đã cũ, một điếu thuốc đang hút dở trên tay, mưa ngày một \r\nnặng hạt, tạo thành những vũng nước trên mặt đường, gió lạnh thổi qua khiến đám lá khô rơi rụng, cuốn theo dòng \r\nnước chảy xiết. Chàng trai La Nuit De L\'Homme là vậy, luôn đầy tâm trạng, lạnh lùng nhưng ẩn dấu sự hấp dẫn đến \r\nkhó cưỡng. Tôi thường ví chàng trai La Nuit De L\'Homme là kẻ \"sát gái\" thuộc bậc kỳ tài, bởi chẳng cần mở lời \r\nquá nhiều, chẳng cần phải chải chuốt lên đồ, cũng không cần phải pha trò hay tạo tình huống, sức hấp dẫn của gã \r\n\"tồi\" này đến từ \"thần thái\", bởi mang trong mình bản năng của một kẻ đầy ắp kinh nghiệm tình trường.  Yves \r\nSaint Laurent luôn mang tới những bất ngờ này tới bất ngờ khác cho mọi tín đồ nước hoa, và nếu tinh ý bạn sẽ \r\nthấy, hoa Lavender có lẽ là vũ khí khoái khẩu của nhà YSL trong việc xúi dục việc \"hút gái\" một cách trắng trợn \r\nvà trực tiếp đến mức kinh điển. Bạch đậu khấu cùng gỗ tuyết tùng như mang hơi thở của người đàn ông này tới gõ \r\ncửa từng giác quan của mọi cô gái, để rồi kết thúc dòng suy nghĩ, đắn đo của đối phương bằng sự cuốn hút đầy \r\nhấp dẫn của Cỏ hương bài và Thì là Ba tư. Đừng tin những gì La Nuit De L\'Homme nói với bạn, chỉ có điều dù nghe \r\nlời khuyên của tôi bao nhiêu lần đi chăng nữa, sức hút và sự cool ngầu của gã này sẽ khiến bạn chẳng hề bận tâm \r\ntôi là ai và đang muốn giải thích với bạn điều gì nữa đâu. '),
(6, 'Anh', 2017, 'Quả bưởi, Cỏ hương bài, Long diên hương', 'Sang trọng, Nam tính, Cuốn hút', 'Hương Đầu: Bưởi Chùm, Chanh Vàng, Cam Bergamot, Chanh, Xạ Hương, Ngải Cứu, Cao Su Thơm.\r\nHương Giữa: Cỏ Hương Bài, Quả Bách Xù, Lý Chua Đen, Táo, Tiêu Hồng, Tuyết Tùng, Hoa Hồng, Hoa Nhài, \r\nNagarmotha, Hoa Ly.\r\nHương Cuối: Long Diên Hương, Vani, Benzoin, Da Thuộc, Labdanum.\r\n\r\n“Elysium - rất ít người có khả năng hiện thực hóa giấc mơ thành hiện thực. Chỉ những người thực sự cố \r\ngắng cùng với nhân đức vốn có mới có thể hi vọng đạt được cuộc sống mà họ mong muốn, vì vậy mỗi thành \r\nphần trong mùi hương này được chọn để mô phỏng sức mạnh hiếm có của tính cách. Những hương liệu phức \r\ntạp như Cam Bergamot, Long Diên Hương, Quả Bạch xù đã hình thành nên một mùi hương dành cho người đàn \r\nông không cần trợ giúp để đến được Elysium, thiên đường của anh ta. ” - ROJA YÊU.\r\n\r\nMở đầu bằng một hỗn hợp tươi mát của họ nhà Cam, Chanh nhằm tạo ra một nguồn năng lượng hứng khởi. \r\nNhững đam mê nồng cháy đang rực rỡ nhờ cỏ hương bài, hoa hồng và quả lý chua đen. Cuối cùng, để hiện \r\nthực hóa giấc mơ, một nguồn sức mạnh dồi dào, một mùi hương nồng nàn còn lưu lại trên cánh mũi là \r\nhương thơm của Long Diên Hương và Da Thuộc đang dần dà chiếm lấy ưu thế trên làn da đầy gợi cảm, \r\nkhiêu khích.'),
(4, 'Pháp', 2020, 'Hương biển, Hương khoáng chất', 'Tươi mới, Hiện đại, Lịch lãm', 'Hương đầu: Hương biển, Cam Bergamot, Quýt xanh, Aquozone\r\nHương giữa: Hương thảo, Hoa oải hương, cây bách, Mastic hoặc lentisque\r\nHương cuối: Hổ phách, Hoắc hương, xạ hương, Hương khoáng\r\n\r\nThêm một \"quý tử\" của Alberto Morrilas được chào đời vào năm 2020, giữa những tâm bão của thế giới.\r\nGio Profondo thừa hưởng những nền tảng cổ điển của người đàn anh Acqua di Giò.\r\nMở ra với hương biển chảy vào tinh chất nước hoa, giải phóng những nốt hương cơ bản cam bergamot, quýt xanh và \r\nAquozone khiến Gio Profondo trở nên thú vị, năng động.\r\nMột loạt hoa hương thảo, oải hương và cây bách sánh bước cùng nhau giải phóng những năng lực tiềm tàng, khiến \r\nkhông gian trở nên tràn ngập năng lượng tích cực cần thiết cho những ngày hè.\r\nCuối cùng, đọng lại nơi cánh mũi là sự thư thái, êm ả rồi bỗng chốc vỡ òa bởi những sự tương phản nồng nàn của \r\nhổ phách, xạ hương cùng với những tươi mới đầy khí chất của hương khoáng.'),
(5, 'Pháp', 2015, 'Hương biển, Hương nhang, Cam bergamot', 'Tinh tế, Nam tính, Lịch lãm, Tươi mát', 'Hương Đầu: Cam Bergamot, Hương nước biển\r\nHương giữa: Hoa phong lữ, Cây hương thảo\r\nHương cuối: Cây hoắc hương, Nhang (Hương)\r\n\r\nGần 20 năm sau khi ra mắt nước hoa Acqua di Gio, Armani đã cho ra mắt một phiên bản mới với tên gọi là  \r\nAcqua di Gio Profumo, tao nhã, tươi mát và nam tính với hương thơm tượng trưng cho sự hợp nhất của \r\nsóng biển và những tảng đá màu đen. Giorgio Armani Acqua di Gio Profumo sở hữu trong mình sự gần gũi, \r\nmạnh mẽ của người đàn anh đi trước, nhưng tính cách đã trở nên thay đổi đáng kể. Từ một chàng trai đẹp \r\nmã, đào hoa, đánh gục đối phương chỉ bằng nụ cười và sự thân thiện, Acqua di Gio Profumo còn được nâng \r\ncấp bằng sự trưởng thành, tự tin và sự \"mãnh liệt\" nữa. Mở đầu sự cao trào và tươi mát với hương nước \r\nbiển, Acqua di Gio Profumo trở nên khác biệt với hương thơm của Hoa phong lữ, trước khi gây \"nghiện\" \r\nbằng mùi hương đầy thú vị của Cây hoắc hương và Nhang. Nếu mùa hè thực sự khiến bạn khó chịu, và nếu \r\nnhững mùi hương tươi mát làm bạn cảm thấy nhàm chán, thì Giorgio Armani Acqua di Gio Profumo có lẽ là \r\nsự lựa chọn hoàn hảo, bởi sự tươi mát của chàng trai này hết sức ấn tượng và khó lường. '),
(9, 'Pháp, Tây Ban Nha', 2020, 'Nguyên liệu phương Đông, Hương vani, Hoa oải hương', 'Gợi cảm, Quyến rũ, Thu hút', 'Hương Đầu: Bạch Đậu Khấu\r\nHương Giữa: Hoa Oải Hương, Iris\r\nHương Cuối: Vani, Oriental note, Hương Gỗ.\r\n\r\nLe Male Le Parfum của Jean Paul Gaultier là một hương thơm phương Đông dành cho nam giới. Được ra mắt \r\nvào năm 2020, Le Male Le Parfum được tạo ra bởi Quentin Bisch và Nathalie Gracia-Cetto.\r\nMở đầu bằng sự độc tôn của Bạch Đậu Khấu, Le Male Le Parfum thể hiện được sự độc đáo và táo bạo trong \r\ncách suy nghĩ và hành động của mình khi chỉ dùng 1 loại hương cho tầng hương đầu tiên nhằm thách thức \r\ncũng như lôi kéo sự tò mò của khán giả về phía mình.\r\nKhông ngần ngại tỏ sự thông minh, lôi cuốn của mình, Le Male Le Parfum tỏ mình dưới một vỏ bọc hoàn \r\nhảo, sự ngọt ngào được trau chuốt cùng với sự phóng khoáng của Hoa Oải Hương và Iris, khiến Le Male \r\ntrở thành tâm điểm của đám đông.\r\nKhông dừng lại ở đó, Le Male Le Parfum khiến người ta liên tưởng đến những cái ôm đầy ấm áp, an toàn \r\ncủa gã đàn ông lịch thiệp, một cái ốm mang ý nghĩa của sự lãng mạn đặc trưng mùi hương của những đêm \r\nlạnh phương Đông Huyền bí hòa cùng hương gỗ đang dai dẳng mùi hương nơi khứu giác.'),
(10, 'Pháp', 2015, 'Hương trái cây, Hoa hồng, Hương nước biển', 'Sang trọng, Cuốn hút, Tinh tế', 'Hương đầu: Quả chanh vàng, Cam Bergamot, Quả quýt hồng, Trái cây, Tiêu\r\nHương giữa: Hoa hồng Bulgary, Hoa tím, Hương nước biển, Cây hoắc hương\r\nHương cuối: Hổ phách, Rêu sồi, Xạ hương, Gỗ đàn hương, Hương Vani\r\n\r\nSo Blue được Mancera ra mắt cùng với mancera Aoud Blue Notes và cùng nằm trong bộ sưu tập Blue được giới thiệu \r\nđộc quyền tại hội chợ nước hoa Esxence 2015 ở Milan. \r\nVới thiết kế màu xanh tuyệt đẹp, lấp lánh với các sắc thái từ tối đến sáng, hương thơm của Mancera So Blue còn \r\nkhiến các tín đồ nước hoa phải dành rất nhiều sự chú ý.\r\nMột mùi hương đẹp và cực kỳ dễ chịu được nằm trong một thiết kế tinh tế với màu sắc bắt mắt, đó là câu nói của \r\nrất nhiều người vào ngày ra mắt So Blue. \r\nSự kết hợp giữa các nhóm hương trái cây như Cam, Quýt, Chanh cùng với Gỗ và nước, một mùi hương thủy sinh tươi \r\nmát nhưng lại có một độ bám tỏa cực kỳ ấn tượng.\r\nMancera So Blue là nước hoa Unisex, dùng được cho cả Nam và Nữ.'),
(11, 'Pháp', 2013, 'Rượu rum, Thuốc lá, Vani, Hạt tiêu', 'Hấp dẫn, Ngọt ngào, Thu hút', 'Hương Đầu: Cây thuốc lá, Da thuộc, Rượu Rum, Hồng tiêu, Quả chanh vàng, Hoa cam Neroli\r\nHương giữa: Rượu Rum, Cây đơn sâm, Dầu cỏ hương bài\r\nHương cuối: Cây thuốc lá, Hương Va ni, Bồ đề\r\n\r\nJazz Club là tuyển tập của những nốt nhạc cổ điển chứa đựng sự ngọt ngào, khiến bạn trở nên thú vị và \r\ngây hiếu kỳ với mọi người xung quanh. \r\nBạn sẽ như một quý ông lịch lãm, nhâm nhi chậm rãi ly rượu rum trên tay, trong căn phòng có hương thơm \r\ncủa da thuộc, mùi thuốc lá hảo hạng, phảng phất mùi thanh nhẹ của trái chanh vàng và hoa cam Neroli.\r\nJazz Club là sự pha trộn của những điều kỳ diệu đến từ những con người yêu sự nhẹ nhàng những thích sự \r\ntinh tế, và khi rượu rum ngấm dần vào từng hơi thở, hãy nắm lấy tay của một cô nàng tiểu thư nào đó, \r\nnhảy từng điệu jazz quen thuộc theo từng tiếng đàn piano. \r\nKhói thuốc cuộn lấy từng vị ngọt mịn của Vani và cây Bồ đề, biến bạn trở thành một người đàn ông cuốn \r\nhút và nổi bật nhất của ngày hôm nay.'),
(12, 'Mỹ', 2011, 'Gỗ đàn hương ,Giấy cói, Gỗ tuyết tùng', 'Sang trọng, Gợi cảm, Tinh tế', 'Hương chính: Gỗ đàn hương, Gỗ tuyết tùng Virginia, Bạch đậu khấu, Hoa tím, Giấy cói, Da thuộc, Hổ \r\nphách, Hoa diên vĩ.\r\n\r\nSantal 33- Cái tên chưa từng phai nhòa khi nhắc đến thương hiệu “trẻ” Le Labo, với hàng loạt những dấu \r\nấn gây tiếng vang lớn ở thị trường nước hoa.\r\n\r\nKhác biệt và riêng tư, 2 tính từ đơn thuần nhất để nói về Santal 33. Với kết cấu từ 33 loại nguyên liệu \r\nnhưng santal lại mạnh mẽ ở cách biểu đạt thông điệp từ gỗ đàn hương, gỗ tuyết tùng, Bạch đậu khấu,…\r\n\r\nSantal 33 là một bản tuyên ngôn cho sự sáng tạo bởi những nét chấm phá riêng biệt qua mùi hương ám \r\nkhói, đặc biệt khơi dậy sự sống mãnh liệt của rừng già bạc ngàn với hàng niên kỷ.\r\n\r\nTách biệt nhưng không dị biệt, Le Labo Santal 33 “ám ảnh” người dùng bởi hỗn hợp những nốt hương mang \r\ndấu ấn tương phản. Giới tính, địa hình, giai cấp không phải là giới hạn của Santal 33, nó là hành trang \r\ncho những kẻ dám khác biệt, dám thể hiện cái tôi kiêu hãnh và thanh lịch.'),
(14, 'Pháp', 2015, 'Hương ambroxan, Cam bergamot, Hạt tiêu, Hạt tiêu tứ xuyên', 'Phóng khoáng, Nam tính, Cuốn hút', 'Hương Đầu: Tiêu, Cam Bergamot\r\nHương giữa: Lavender, Xuyên tiêu, Hồng tiêu\r\nHương cuối: Gỗ tuyết tùng, Hương Ambroxan\r\n\r\nYêu hay ghét, thì với rất nhiều người, Dior Sauvage vẫn luôn được công nhận là một chai nước hoa kinh \r\nđiển của thế kỷ 21. Nếu bạn so sánh về mức độ phủ sóng của Sauvage và nhìn về năm phát hành của nó, \r\ncuối \"năm 2015\" thì bạn chắc chắn sẽ rất ngạc nhiên về sự nổi tiếng nhanh đến đáng sợ của gã đàn ông \r\nlắm tài nhiều tật này. Mọi người hay so sánh sự nổi tiếng giữa Sauvage của nhà Dior và Bleu de Chanel \r\ncủa nhà Chanel, xem thử ai là kẻ mạnh hơn, nhưng chung quy lại thì là kẻ 8 lạng người hơn nửa cân. \r\nĐược đánh giá là đậm chất đàn ông,  Dior Sauvage mang trong mình mùi hương của sự phong lưu, mạnh mẽ \r\nvà sát gái. Như chính người đại diện cho chai nước hoa này vậy, Johnny Depp, kẻ cướp biển được yêu \r\nquý nhất mọi thời đại. Vốn dĩ  Dior Sauvage là vậy, có tật, Bad boy nhưng ai cũng yêu quý và phục \r\ntùng. Francois Demachy, người sáng tạo ra  Dior Sauvage đã khéo léo pha trộn giữa Cam Bergamot và \r\nhương Ambroxan, tạo nên một khoảng màu xanh tươi mát của bầu trời, cùng sự mạnh mẽ và ấm nồng của \r\ntiêu đen và Gỗ tuyết tùng,  Dior Sauvage trở nên lôi cuốn không có điểm dừng. Kết thúc một buổi gặp \r\ngỡ với những câu chuyện cười thông minh hòa lẫn không khí sang trọng, lãng mạn của hoa Lavender, mọi \r\nánh mắt sẽ chỉ hướng về gã  Dior Sauvage này mà thôi.'),
(13, 'Pháp', 2009, 'Oriental Woody – Nhóm hương gỗ thơm phương đông', 'Bí ẩn , Gợi cảm , Thu hút', 'Hương chính: Mâm xôi, Trái cherry, Mật ong, Hương Vanilla, Hổ phách, Hạnh nhân, Thuốc lá, Hoa nghệ \r\ntây, Đậu Tonka, Bánh gừng, Nhục đậu khấu, Hương Benzoin, Hoa cúc La Mã, Hoắc hương, Hoa phong lẽ, \r\nBạch đậu khấu, Gỗ Oak, Cam Bergamot, Gỗ tuyết tùng, Hương trầm, Hương ngò.\r\n\r\nNước hoa Kilian Back To Black là chai nước hoa Unisex dành cho cả nam và nữ sử dụng. Sản phẩm mang \r\nđến màn khói của bóng tối bí ẩn đầy quyến rũ và kích thích trí tò mò vô cùng. Back To Black là một \r\nmùi hương có cấu trúc vô cùng phức tạp. Nó thuộc BST L`Oiuvre Noire / Black Masterpieces, một trong \r\ntám phiên bản chất lượng của nhà Kilian. Nếu bạn là một người cá tính, có lối sống tự do, khoáng đạt \r\nthì chai nước hoa này sẽ tiếp lửa cho bạn thêm phần sang trọng, cuốn hút.\r\n\r\nKilian Back To Black đưa bạn đi từ mùi hương này qua mùi hương khác một cách đặc biệt. Tổ hợp hương \r\nthơm ngọt ngào đến từ mật ong, vanilla và đậu tonka hòa trong hương thơm trái cây. Nốt hương cam \r\nchanh liên kết cùng cherry và mâm xôi thơm mát. Sắc thái cay cay của nghệ tây, nhục đậu khấu và bạch \r\nđấu khấu. Hương thuốc lá khô vừa sang trọng lại vừa trưởng thành cuốn hút một cách mê hoặc. Và chẳng \r\nthể thiếu đi những nốt hương trầm đầy ấm áp, trìu mến của hương gỗ và hương trầm.\r\n\r\nMỗi sản phẩm mà Killian mang đến lại cho ta thưởng thức những thiết kế nghệ thuật khác nhau. Kilian \r\nBack To Black mang trong mình một lối nghệ thuật riêng biệt. Chai nước hoa được bọc trong một khối \r\nthủy tinh dày hình chữ nhật. Một lớp màu đen bao phủ bên ngoài tạo nên lớp vỏ đầy sang trọng, tinh \r\ntế. Giữa chai được gắn một miếng đề can bằng vàng, khắc nét thương hiệu và tên chai nước hoa. Nắp \r\nchai làm bằng kim loại phủ lớp mạ bạc sáng loáng. Điểm nhấn của chai nước hoa này là vỏ hộp được sơn \r\nmài đen, với các chi tiết trống đồng được vẽ dầy nghệ thuật. Back To Black mang đến cho chàng và nàng \r\nnhững trải nghiệm đầy tinh tế, khiến đối phương lưu luyến mãi không thôi.'),
(21, 'Pháp, Anh , Đức', 2015, 'Hổ phách, Thuốc lá, Gừng, Bạch đậu khấu', 'Quyến rũ, Nam tính, Lịch lãm', 'Nốt hương đầu : Bưởi, Húng quế\r\nNốt hương giữa : Gừng, Bạch đậu khấu\r\nNốt hương cuối : Thuốc lá , Hổ phách\r\n\r\nGần gũi và nam tính. Dolce and Gabbanna The One EDP khác hẳn người anh em The One EDT của mình, đậm đà \r\nmang theo một chút trầm lắng. Làm thức tỉnh khứu giác với mùi Bưởi tươi và Húng Quế, cảm giác như được \r\ntận hưởng một ly cocktail mát lạnh, mang hương vị của những buổi hẹn hò dấu mặt, hồi hộp dự đoán xem \r\nchàng trai tối nay nàng gặp là ai. Hơi ấm của Gừng cùng Bạch đậu khấu toả ra, toát lên vẻ ngoài lịch \r\nlãm của một quý ông hiện đại, hoà quyện vào nhau, mọi hành động của chàng đều khiến cho các cô nàng \r\nsay mê không muốn rời xa. Dư vị của đàn ông, pha lẫn mùi Thuốc Lá, Hổ phách còn vương vấn trên áo, \r\ngiữa tiếng nhạc du dương, cám dỗ cảm xúc bằng ánh đèn, một đêm hẹn hò hoàn hảo của những cặp đôi lần \r\nđầu gặp gỡ. Dolce & Gabbanna The One Eau De Parfum, mùi hương dành cho những người đàn ông tự tin, thú \r\nvị và khó đoán.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `sodondh` int(11) NOT NULL,
  `mskh` int(11) DEFAULT NULL,
  `msnv` int(11) DEFAULT NULL,
  `ngaydh` date DEFAULT NULL,
  `ngaygh` date DEFAULT NULL,
  `trangthaidh` varchar(255) DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `madc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`sodondh`, `mskh`, `msnv`, `ngaydh`, `ngaygh`, `trangthaidh`, `ghichu`, `madc`) VALUES
(1, 1, 2, '2021-11-12', '2021-11-20', 'Đã Giao', '', 1),
(2, 1, 1, '2021-11-12', '2021-11-20', 'Đã Giao', '', 2),
(5, 1, 2, '2021-11-20', '0000-00-00', 'Đã Hủy', 'Giao giờ hành chánh', 1),
(6, 1, 2, '2021-11-24', NULL, 'Chưa Xử Lý', '', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `madc` int(11) NOT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `mskh` int(11) DEFAULT NULL,
  `tennguoinhan` varchar(255) DEFAULT NULL,
  `sodienthoainguoinhan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`madc`, `diachi`, `mskh`, `tennguoinhan`, `sodienthoainguoinhan`) VALUES
(1, '182/45 Trần Hưng Đạo, Quận 7 , Phường 3 , TP Cần Thơ', 1, 'Lê Thành Đạt', '0984978407'),
(2, '35/69 Phạm Ngũ Lão, TP Cần Thơ', 1, 'Dương Thị Hồng Nhung', '0939597826'),
(3, '48 Nguyễn Văn Trỗi, Cần Thơ', 1, 'Lê Thành Đạt', '0984978407'),
(4, '182/45 Trần Hưng Đạo, Quận 7 , Phường 3 , TP Hồ Chí Minh', 3, 'Lê Thành Đạt', '0984978407');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mshh` int(11) NOT NULL,
  `tenhh` varchar(255) NOT NULL,
  `quycach` varchar(255) NOT NULL,
  `gia` float NOT NULL,
  `soluonghang` int(11) NOT NULL,
  `soluongdaban` int(11) DEFAULT NULL,
  `giamgia` float DEFAULT NULL,
  `maloaihang` int(11) NOT NULL,
  `ghichu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mshh`, `tenhh`, `quycach`, `gia`, `soluonghang`, `soluongdaban`, `giamgia`, `maloaihang`, `ghichu`) VALUES
(1, 'Dior Sauvage', 'EDP - 100ml', 3250000, 9, 2, 0.05, 1, 'Giảm Giá Đến Hết Tháng 10!'),
(2, 'Bleu de Chanel', 'EDP - 100ml', 3450000, 10, 0, 0.05, 2, 'Giảm Giá Đến Hết Tháng 10! \r\n'),
(3, 'Giorgio Armani Acqua Di Gio Pour Homme', 'EDT - 100ml', 2350000, 8, 2, 0.03, 4, 'Giảm Giá Đến Hết Tháng 10! \r\n'),
(4, 'Giorgio Armani Acqua Di Gio Profondo', 'EDP - 75ml', 2680000, 10, 0, 0.03, 4, 'Giảm Giá Đến Hết Tháng 10! \r\n'),
(5, 'Giorgio Armani Acqua Di Gio Profumo ', 'EDP - 75ml', 2530000, 9, 1, 0.03, 4, 'Giảm Giá Đến Hết Tháng 10! \r\n'),
(6, 'Roja Elysium Pour Homme', 'Parfum - 100ml', 6250000, 4, 1, 0.02, 3, 'Giảm Giá Đến Hết Tháng 10!'),
(7, 'Louis Vuitton California Dream', 'EDP - 100ml', 8500000, 5, 0, 0, 9, ''),
(8, 'La Nuit De L\'homme', 'EDT - 100ml', 2650000, 15, 0, 0.05, 5, 'Giảm Giá Đến Hết Tháng 10!'),
(9, 'Jean Paul Gaultier Le Male Le Parfum', 'EDP - 125ml', 2100000, 10, 0, 0.05, 8, 'Giảm Giá Đến Hết Tháng 10!'),
(10, 'Mancera So Blue', 'EDP - 120ml', 2140000, 10, 0, 0, 6, ''),
(11, 'Maison Margiela Replica Jazz Club', 'EDT - 100ml', 3250000, 10, 0, 0.06, 7, 'Giảm Giá Đến Hết Tháng 10!'),
(12, 'Le Labo Santal 33', 'EDP - 50ml', 6500000, 5, 0, 0.03, 10, 'Giảm Giá Đến Hết Tháng 10!'),
(13, 'Back To Black', 'EDP - 50ml', 6500000, 4, 1, 0.05, 11, 'Giảm Giá Đến Hết Tháng 10!'),
(14, 'Dior Sauvage', 'EDT - 100ml', 2650000, 0, 0, 0.03, 1, 'Giảm Giá Đến Hết Tháng 10!'),
(20, 'By Kilian Love', 'EDP - 50ml', 6300000, 3, 1, 0.05, 11, 'Giảm Giá Đến Hết Tháng 10!'),
(21, 'Dolce & Gabbana The One', 'EDP - 100ml', 2500000, 10, 0, 0.03, 12, 'Giảm Giá Đến Hết Tháng 10!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `mahinh` int(11) NOT NULL,
  `tenhinh` varchar(255) DEFAULT NULL,
  `mshh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`mahinh`, `tenhinh`, `mshh`) VALUES
(1, '../img/Perfume/dior-sauvage.jpg', 1),
(2, '../img/Perfume/gio_trang.jpg', 3),
(3, '../img/Perfume/gio_profondo.jpg', 4),
(4, '../img/Perfume/gio_profumo.jpg', 5),
(5, '../img/Perfume/back_to_black_kilian.jpg', 13),
(6, '../img/Perfume/dior-sauvage-edt.jpg', 14),
(7, '../img/Perfume/la_nuit_de_lhomme.jpg', 8),
(8, '../img/Perfume/jean-paul-gaultier-le-male-le-parfum.jpg', 9),
(9, '../img/Perfume/le-labo-santal-33.jpg', 12),
(10, '../img/Perfume/maison_margiela_replica_jazz-club_.jpg', 11),
(11, '../img/Perfume/roja.jpg', 6),
(12, '../img/Perfume/mancera_so_blue.jpg', 10),
(13, '../img/Perfume/dior-sauvage-2.jpg', 1),
(14, '../img/Perfume/la_nuit_de_lhomme1.jpg', 8),
(15, '../img/Perfume/lv_cali1.jpg', 7),
(16, '../img/Perfume/lv_cali.jpg', 7),
(17, '../img/Perfume/mancera_so_blue1.jpg', 10),
(18, '../img/Perfume/bleu_de_chanel-4.jpg', 2),
(19, '../img/Perfume/bleu_de_chanel.jpg', 2),
(24, '../img/Perfume/by_kilian.jpg', 20),
(25, '../img/Perfume/theone.jpg', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `mskh` int(11) NOT NULL,
  `hotenkh` varchar(255) DEFAULT NULL,
  `tencongty` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL,
  `sofax` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tendangnhap` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`mskh`, `hotenkh`, `tencongty`, `sodienthoai`, `sofax`, `email`, `tendangnhap`, `matkhau`, `ghichu`) VALUES
(1, 'Lê Thành Đạt', 'Trường Đại Học Cần Thơ', '0984978407', '+84 (8) 3823 3318', 'datb1809227@student.ctu.edu.vn', 'sonsonson321', '3c718324c6a5ff4c209874974abfa2a5', ''),
(3, '', 'Trường Đại Học Cần Thơ', '0984978407', '', 'pnhb13lethanhdat@gmail.com', 'b1809227', '3c718324c6a5ff4c209874974abfa2a5', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `maloaihang` int(11) NOT NULL,
  `tenloaihang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`maloaihang`, `tenloaihang`) VALUES
(1, 'Christian Dior'),
(2, 'Chanel'),
(3, 'Roja'),
(4, 'Giorgio Armani'),
(5, 'Yves Saint Laurent'),
(6, 'Mancera'),
(7, 'Maison Margiela'),
(8, 'Jean Paul Gaultier'),
(9, 'Louis Vuitton'),
(10, 'Le Labo'),
(11, 'By Kilian'),
(12, 'Dolce Gabbana');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `msnv` int(11) NOT NULL,
  `hotennv` varchar(255) DEFAULT NULL,
  `chucvu` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`msnv`, `hotennv`, `chucvu`, `diachi`, `sodienthoai`, `ghichu`) VALUES
(1, 'Dương Thị Hồng Nhung', 'Tổng Giám Đốc', 'Thới Bình,Cần Thơ', '0939597826', ''),
(2, 'Lê Thành Đạt', 'Giám Đốc', '182/45 Trần Hưng Đạo, Quận 7 , Phường 3 , TP Cần Thơ', '0984978407', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`tendangnhap`, `matkhau`) VALUES
('b1809227', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtindoanhnghiep`
--

CREATE TABLE `thongtindoanhnghiep` (
  `tendoanhnghiep` varchar(255) NOT NULL,
  `tenadmin` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sodienthoai` varchar(255) NOT NULL,
  `chitietdoanhnghiep` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thongtindoanhnghiep`
--

INSERT INTO `thongtindoanhnghiep` (`tendoanhnghiep`, `tenadmin`, `email`, `diachi`, `sodienthoai`, `chitietdoanhnghiep`, `hinhanh`) VALUES
('Le Perfume', 'Lê Thành Đạt', 'datb1809227@student.ctu.edu.vn', '182/45 Trần Hưng Đạo, Quận 7 , Phường 3 , TP Hồ Chí Minh', '0984978407', 'Shop nước hoa chính hãng\r\n                                 \r\n                                ', '../img/info/user.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD KEY `sodondh` (`sodondh`),
  ADD KEY `mshh` (`mshh`);

--
-- Chỉ mục cho bảng `chitiethanghoa`
--
ALTER TABLE `chitiethanghoa`
  ADD KEY `mshh` (`mshh`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`sodondh`),
  ADD KEY `mskh` (`mskh`),
  ADD KEY `msnv` (`msnv`),
  ADD KEY `madc` (`madc`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`madc`),
  ADD KEY `mskh` (`mskh`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mshh`),
  ADD KEY `maloaihang` (`maloaihang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`mahinh`),
  ADD KEY `mshh` (`mshh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`mskh`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`maloaihang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`msnv`);

--
-- Chỉ mục cho bảng `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Chỉ mục cho bảng `thongtindoanhnghiep`
--
ALTER TABLE `thongtindoanhnghiep`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `sodondh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `madc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mshh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `mahinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `mskh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `maloaihang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `msnv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`sodondh`) REFERENCES `dathang` (`sodondh`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`mshh`) REFERENCES `hanghoa` (`mshh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethanghoa`
--
ALTER TABLE `chitiethanghoa`
  ADD CONSTRAINT `chitiethanghoa_ibfk_1` FOREIGN KEY (`mshh`) REFERENCES `hanghoa` (`mshh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`mskh`) REFERENCES `khachhang` (`mskh`) ON DELETE CASCADE,
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`msnv`) REFERENCES `nhanvien` (`msnv`) ON DELETE CASCADE,
  ADD CONSTRAINT `madc` FOREIGN KEY (`madc`) REFERENCES `diachikh` (`madc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`mskh`) REFERENCES `khachhang` (`mskh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`maloaihang`) REFERENCES `loaihanghoa` (`maloaihang`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`mshh`) REFERENCES `hanghoa` (`mshh`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
