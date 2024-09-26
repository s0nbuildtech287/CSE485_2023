--câu a
select * from baiviet join theloai on baiviet.ma_tloai = theloai.ma_tloai
where theloai.ten_tloai = "Nhạc trữ tình";

--câu b
select * from baiviet join tacgia on baiviet.ma_tgia = tacgia.ma_tgia 
where tacgia.ten_tgia = "Nhacvietplus";

--câu c
select * from theloai join baiviet 
on theloai.ma_tloai = baiviet.ma_tloai
where baiviet.ma_bviet is null;

--câu d
select baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, tacgia.ten_tgia, baiviet.ngayviet
from baiviet
JOIN tacgia on baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai on baiviet.ma_tloai = theloai.ma_tloai;

--câu e
select theloai.ten_tloai from theloai
join baiviet ON theloai.ma_tloai = baiviet.ma_tloai
group by theloai.ma_tloai
order by count(baiviet.ma_bviet) desc
limit 1

--câu f
select tacgia.ten_tgia, count(baiviet.ma_bviet) as so_bai_viet
from tacgia
join baiviet on tacgia.ma_tgia = baiviet.ma_tgia
group by tacgia.ma_tgia
order by so_bai_viet desc
limit 2;

--câu g
select * from baiviet
where baiviet.ten_bhat like '%yêu%' or baiviet.ten_bhat like '%thương%' or baiviet.ten_bhat like '%anh%' or baiviet.ten_bhat like '%em%';

--câu h
select * from baiviet
where baiviet.tieude like '%yêu%' or baiviet.tieude like '%thương%' or baiviet.ten_bhat like '%yêu%' 
or baiviet.ten_bhat like '%thương%' or baiviet.ten_bhat like '%anh%' or baiviet.ten_bhat LIKE '%em%';

--câu i
create view vw_Music as
select baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, tacgia.ten_tgia, baiviet.ngayviet
from baiviet
JOIN tacgia on baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai on baiviet.ma_tloai = theloai.ma_tloai;

--câu j
create procedure sp_DSBaiViet(IN ten_tloai_param varchar(50))
begin
    declare tloai_id int;
    select theloai.ma_tloai into tloai_id from theloai where theloai.ten_tloai = ten_tloai_param;
    if tloai_id IS NULL then
        SIGNAL SQLSTATE '45000' set MESSAGE_TEXT = 'Thể loại không tồn tại';
    else
        select * from baiviet where baiviet.ma_tloai = tloai_id;
    end if;
end

--câu k
alter table theloai add column SLBaiViet int default 0;

DELIMITER //
create trigger tg_CapNhatTheLoai
after insert on baiviet
for each row
begin
    update theloai set theloai.SLBaiViet = theloai.SLBaiViet + 1 where theloai.ma_tloai = NEW.ma_tloai;
end //

create trigger tg_CapNhatTheLoai_Sua
after update on baiviet
for each row
begin
    IF NEW.ma_tloai != OLD.ma_tloai then
        update theloai set theloai.SLBaiViet = theloai.SLBaiViet - 1 where theloai.ma_tloai = OLD.ma_tloai;
        update theloai set theloai.SLBaiViet = theloai.SLBaiViet + 1 where theloai.ma_tloai = NEW.ma_tloai;
    end if;
end //

create trigger tg_CapNhatTheLoai_Xoa
after delete on baiviet
for each row
begin
    update theloai set theloai.SLBaiViet = theloai.SLBaiViet - 1 where theloai.ma_tloai = OLD.ma_tloai;
end //
DELIMITER ;

--câu l
create table Users (
    user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
