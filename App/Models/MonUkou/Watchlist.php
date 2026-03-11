<?php

class Watchlist {
    private int $id;
    private DateTime $date;
    private Account $account;
    private array $movies = []; // Khởi tạo mảng rỗng chứa các đối tượng Movie

    public function __construct(int $id, DateTime $date, Account $account) {
        $this->id = $id;
        $this->date = $date;
        $this->account = $account;
    }

    // --- Các phương thức từ sơ đồ ---
    
    // Thêm phim vào danh sách
    public function addMovie(Movie $movie): void {
        // Kiểm tra tránh thêm trùng lặp (giả sử Movie có hàm getId)
        foreach ($this->movies as $m) {
            if ($m->getId() === $movie->getId()) {
                return; // Đã có trong danh sách thì bỏ qua
            }
        }
        $this->movies[] = $movie;
    }

    // Xóa phim khỏi danh sách
    public function removeMovie(Movie $movie): void {
        foreach ($this->movies as $key => $m) {
            if ($m->getId() === $movie->getId()) {
                unset($this->movies[$key]); // Xóa phần tử khỏi mảng
                // Reset lại index của mảng sau khi xóa
                $this->movies = array_values($this->movies); 
                break;
            }
        }
    }

    // --- Getter ---
    public function getMovies(): array {
        return $this->movies;
    }
}
?>
