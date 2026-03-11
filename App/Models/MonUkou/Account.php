<?php

class Account {
    private int $id;
    private string $user;
    private string $pass;
    private string $email;
    private string $tel;
    private int $role;

    private ?Watchlist $watchlist = null; // Dấu ? nghĩa là có thể null
    private array $feedbacks = [];

    // Hàm khởi tạo
    public function __construct(int $id, string $user, string $pass, string $email, string $tel, int $role) {
        $this->id = $id;
        $this->user = $user;
        $this->pass = $pass;
        $this->email = $email;
        $this->tel = $tel;
        $this->role = $role;
    }

    // --- Các phương thức từ sơ đồ ---
    public function login(): bool {
        // Xử lý kiểm tra user/pass với Database
        return true; 
    }

    public function logout(): void {
        // Hủy session đăng nhập
    }

    public function updateProfile(string $email, string $tel): void {
        $this->email = $email;
        $this->tel = $tel;
    }

    // --- Getter / Setter cho các thuộc tính cần thiết ---
    public function getId(): int { return $this->id; }
    public function getUser(): string { return $this->user; }
    
    // Gán Watchlist cho Account
    public function setWatchlist(Watchlist $watchlist): void {
        $this->watchlist = $watchlist;
    }

    // Thêm Feedback vào danh sách của user
    public function addFeedback(Feedback $feedback): void {
        $this->feedbacks[] = $feedback;
    }
}
?>
