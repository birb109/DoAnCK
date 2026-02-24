BEGIN
    SELECT 
        m.Movie_Tittle AS TenPhim, 
        m.Movie_ReleaseDate AS NgayPhatHanh,
        g.Genre_Name AS TheLoai
    FROM tbl_movie m
    INNER JOIN tbl_genre g ON m.Genre_ID = g.Genre_ID
    ORDER BY m.Movie_ReleaseDate DESC;
END
