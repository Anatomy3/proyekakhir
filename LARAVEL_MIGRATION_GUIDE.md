# 🚀 LARAVEL MIGRATION GUIDE
## Panduan Migrasi ke Framework Laravel untuk Proyek Akhir

Dokumen ini menyediakan panduan lengkap untuk mengkonversi website statis Daiku Interior & Eksterior ke aplikasi Laravel yang siap produksi.

---

## 📋 **STRUKTUR PROYEK LARAVEL**

### **1. Database Schema (Migrations)**

Berdasarkan ERD proyek akhir, berikut struktur database yang perlu dibuat:

```php
// database/migrations/create_users_table.php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->enum('role', ['customer', 'admin', 'designer'])->default('customer');
    $table->string('avatar')->nullable();
    $table->text('address')->nullable();
    $table->string('city')->nullable();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->enum('status', ['active', 'inactive'])->default('active');
    $table->rememberToken();
    $table->timestamps();
});

// database/migrations/create_design_categories_table.php
Schema::create('design_categories', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug')->unique();
    $table->text('description')->nullable();
    $table->string('image')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});

// database/migrations/create_designs_table.php
Schema::create('designs', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('description');
    $table->unsignedBigInteger('category_id');
    $table->enum('style', ['Modern', 'Minimalis', 'Contemporary', 'Scandinavian', 'Industrial', 'Luxury', 'Traditional']);
    $table->decimal('price', 15, 2);
    $table->decimal('price_per_m2', 10, 2);
    $table->string('main_image');
    $table->json('gallery')->nullable();
    $table->json('specifications');
    $table->json('materials');
    $table->json('colors');
    $table->string('area')->nullable();
    $table->string('duration')->nullable();
    $table->string('designer_name');
    $table->boolean('is_completed')->default(false);
    $table->decimal('rating', 2, 1)->nullable();
    $table->integer('reviews_count')->default(0);
    $table->json('tags')->nullable();
    $table->boolean('is_featured')->default(false);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
    
    $table->foreign('category_id')->references('id')->on('design_categories');
});

// database/migrations/create_orders_table.php
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->string('order_number')->unique();
    $table->unsignedBigInteger('customer_id');
    $table->unsignedBigInteger('design_id');
    $table->unsignedBigInteger('designer_id')->nullable();
    $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled'])->default('pending');
    $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
    $table->decimal('total_amount', 15, 2);
    $table->decimal('down_payment', 15, 2)->default(0);
    $table->decimal('remaining_payment', 15, 2);
    $table->date('order_date');
    $table->date('start_date')->nullable();
    $table->date('completion_date')->nullable();
    $table->date('estimated_completion')->nullable();
    $table->text('customer_address');
    $table->string('area');
    $table->text('notes')->nullable();
    $table->text('custom_requirements')->nullable();
    $table->enum('project_stage', ['design', 'construction', 'finishing', 'completed'])->default('design');
    $table->integer('progress_percentage')->default(0);
    $table->enum('payment_status', ['unpaid', 'partial', 'paid'])->default('unpaid');
    $table->json('payment_schedule')->nullable();
    $table->timestamps();
    
    $table->foreign('customer_id')->references('id')->on('users');
    $table->foreign('design_id')->references('id')->on('designs');
    $table->foreign('designer_id')->references('id')->on('users');
});

// database/migrations/create_payments_table.php
Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->string('payment_code')->unique();
    $table->unsignedBigInteger('order_id');
    $table->decimal('amount', 15, 2);
    $table->enum('payment_type', ['down_payment', 'progress_50', 'progress_80', 'final_payment']);
    $table->enum('payment_method', ['bank_transfer'])->default('bank_transfer');
    $table->string('bank_name')->nullable();
    $table->string('account_number')->nullable();
    $table->string('unique_code', 3);
    $table->decimal('total_with_code', 15, 2);
    $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
    $table->datetime('payment_date')->nullable();
    $table->datetime('verification_date')->nullable();
    $table->string('receipt_file')->nullable();
    $table->unsignedBigInteger('verified_by')->nullable();
    $table->text('notes')->nullable();
    $table->timestamps();
    
    $table->foreign('order_id')->references('id')->on('orders');
    $table->foreign('verified_by')->references('id')->on('users');
});

// database/migrations/create_consultations_table.php
Schema::create('consultations', function (Blueprint $table) {
    $table->id();
    $table->string('consultation_code')->unique();
    $table->unsignedBigInteger('customer_id');
    $table->unsignedBigInteger('designer_id')->nullable();
    $table->enum('type', ['online', 'offline'])->default('online');
    $table->enum('status', ['scheduled', 'ongoing', 'completed', 'cancelled'])->default('scheduled');
    $table->datetime('scheduled_at');
    $table->datetime('started_at')->nullable();
    $table->datetime('completed_at')->nullable();
    $table->text('customer_requirements');
    $table->json('project_details');
    $table->text('designer_notes')->nullable();
    $table->text('result_summary')->nullable();
    $table->json('uploaded_files')->nullable();
    $table->timestamps();
    
    $table->foreign('customer_id')->references('id')->on('users');
    $table->foreign('designer_id')->references('id')->on('users');
});

// database/migrations/create_chats_table.php
Schema::create('chats', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('order_id')->nullable();
    $table->unsignedBigInteger('consultation_id')->nullable();
    $table->unsignedBigInteger('sender_id');
    $table->unsignedBigInteger('receiver_id');
    $table->text('message');
    $table->json('attachments')->nullable();
    $table->boolean('is_read')->default(false);
    $table->datetime('read_at')->nullable();
    $table->timestamps();
    
    $table->foreign('order_id')->references('id')->on('orders');
    $table->foreign('consultation_id')->references('id')->on('consultations');
    $table->foreign('sender_id')->references('id')->on('users');
    $table->foreign('receiver_id')->references('id')->on('users');
});

// database/migrations/create_notifications_table.php
Schema::create('notifications', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->string('type');
    $table->string('title');
    $table->text('message');
    $table->json('data')->nullable();
    $table->boolean('is_read')->default(false);
    $table->datetime('read_at')->nullable();
    $table->timestamps();
    
    $table->foreign('user_id')->references('id')->on('users');
});

// database/migrations/create_rfq_requests_table.php
Schema::create('rfq_requests', function (Blueprint $table) {
    $table->id();
    $table->string('rfq_code')->unique();
    $table->unsignedBigInteger('customer_id');
    $table->string('project_type');
    $table->json('rooms');
    $table->string('design_style')->nullable();
    $table->string('area')->nullable();
    $table->string('budget_range');
    $table->string('timeline')->nullable();
    $table->text('project_description');
    $table->text('customer_address');
    $table->string('city');
    $table->json('uploaded_files')->nullable();
    $table->enum('status', ['pending', 'quoted', 'accepted', 'rejected'])->default('pending');
    $table->decimal('quoted_amount', 15, 2)->nullable();
    $table->text('admin_notes')->nullable();
    $table->unsignedBigInteger('handled_by')->nullable();
    $table->timestamps();
    
    $table->foreign('customer_id')->references('id')->on('users');
    $table->foreign('handled_by')->references('id')->on('users');
});
```

### **2. Models dengan Relationships**

```php
// app/Models/User.php
class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'phone', 'role', 'avatar', 'address', 'city', 'password', 'status'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function designerOrders()
    {
        return $this->hasMany(Order::class, 'designer_id');
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'customer_id');
    }

    public function designerConsultations()
    {
        return $this->hasMany(Consultation::class, 'designer_id');
    }

    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'receiver_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function rfqRequests()
    {
        return $this->hasMany(RfqRequest::class, 'customer_id');
    }
}

// app/Models/Design.php
class Design extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'category_id', 'style', 'price', 
        'price_per_m2', 'main_image', 'gallery', 'specifications', 
        'materials', 'colors', 'area', 'duration', 'designer_name',
        'is_completed', 'rating', 'reviews_count', 'tags', 'is_featured', 'is_active'
    ];

    protected $casts = [
        'gallery' => 'array',
        'specifications' => 'array',
        'materials' => 'array',
        'colors' => 'array',
        'tags' => 'array',
        'is_completed' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(DesignCategory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

// app/Models/Order.php
class Order extends Model
{
    protected $fillable = [
        'order_number', 'customer_id', 'design_id', 'designer_id',
        'status', 'priority', 'total_amount', 'down_payment', 'remaining_payment',
        'order_date', 'start_date', 'completion_date', 'estimated_completion',
        'customer_address', 'area', 'notes', 'custom_requirements',
        'project_stage', 'progress_percentage', 'payment_status', 'payment_schedule'
    ];

    protected $casts = [
        'order_date' => 'date',
        'start_date' => 'date',
        'completion_date' => 'date',
        'estimated_completion' => 'date',
        'payment_schedule' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    public function designer()
    {
        return $this->belongsTo(User::class, 'designer_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($order) {
            $order->order_number = 'ORD-' . date('Y') . '-' . str_pad(static::count() + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
```

### **3. Controllers Structure**

```php
// app/Http/Controllers/Web/HomeController.php
class HomeController extends Controller
{
    public function index()
    {
        $featuredDesigns = Design::where('is_featured', true)
                                ->where('is_active', true)
                                ->limit(6)
                                ->get();
        
        $testimonials = Testimonial::where('is_active', true)
                                 ->latest()
                                 ->limit(6)
                                 ->get();
        
        $statistics = [
            'completed_projects' => Order::where('status', 'completed')->count(),
            'active_projects' => Order::whereIn('status', ['confirmed', 'in_progress'])->count(),
            'happy_customers' => User::where('role', 'customer')->count(),
            'years_experience' => date('Y') - 2018,
        ];
        
        return view('welcome', compact('featuredDesigns', 'testimonials', 'statistics'));
    }
}

// app/Http/Controllers/Web/CatalogController.php
class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Design::where('is_active', true)->with('category');
        
        // Apply filters
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->filled('style')) {
            $query->where('style', $request->style);
        }
        
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        // Apply sorting
        switch ($request->get('sort', 'title')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'newest':
                $query->latest();
                break;
            default:
                $query->orderBy('title', 'asc');
        }
        
        $designs = $query->paginate(9);
        $categories = DesignCategory::where('is_active', true)->get();
        
        return view('catalog.index', compact('designs', 'categories'));
    }
    
    public function show(Design $design)
    {
        $relatedDesigns = Design::where('category_id', $design->category_id)
                               ->where('id', '!=', $design->id)
                               ->where('is_active', true)
                               ->limit(3)
                               ->get();
        
        return view('catalog.show', compact('design', 'relatedDesigns'));
    }
}

// app/Http/Controllers/Web/RFQController.php
class RFQController extends Controller
{
    public function create()
    {
        return view('rfq.create');
    }
    
    public function store(RFQRequest $request)
    {
        $validated = $request->validated();
        
        // Handle file uploads
        if ($request->hasFile('files')) {
            $uploadedFiles = [];
            foreach ($request->file('files') as $file) {
                $path = $file->store('rfq-files', 'public');
                $uploadedFiles[] = [
                    'original_name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize(),
                    'mime_type' => $file->getMimeType(),
                ];
            }
            $validated['uploaded_files'] = $uploadedFiles;
        }
        
        $rfq = RfqRequest::create(array_merge($validated, [
            'customer_id' => auth()->id(),
            'rfq_code' => 'RFQ-' . date('Y') . '-' . str_pad(RfqRequest::count() + 1, 4, '0', STR_PAD_LEFT),
        ]));
        
        // Send notification to admins
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notifications()->create([
                'type' => 'new_rfq',
                'title' => 'Permintaan RFQ Baru',
                'message' => "Permintaan RFQ baru dari {$rfq->customer->name}",
                'data' => ['rfq_id' => $rfq->id],
            ]);
        }
        
        return redirect()->route('rfq.success', $rfq);
    }
}

// app/Http/Controllers/Dashboard/CustomerController.php
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:customer']);
    }
    
    public function index()
    {
        $customer = auth()->user();
        
        $stats = [
            'total_orders' => $customer->orders()->count(),
            'active_projects' => $customer->orders()->whereIn('status', ['confirmed', 'in_progress'])->count(),
            'completed_projects' => $customer->orders()->where('status', 'completed')->count(),
            'total_investment' => $customer->orders()->sum('total_amount'),
        ];
        
        $activeOrders = $customer->orders()
                               ->whereIn('status', ['confirmed', 'in_progress'])
                               ->with(['design', 'designer'])
                               ->latest()
                               ->limit(5)
                               ->get();
        
        $recentOrders = $customer->orders()
                               ->with(['design', 'payments'])
                               ->latest()
                               ->limit(10)
                               ->get();
        
        $recentChats = Chat::where('receiver_id', $customer->id)
                          ->orWhere('sender_id', $customer->id)
                          ->with(['sender', 'receiver'])
                          ->latest()
                          ->limit(5)
                          ->get();
        
        $notifications = $customer->notifications()
                                ->where('is_read', false)
                                ->latest()
                                ->limit(5)
                                ->get();
        
        return view('dashboard.customer.index', compact(
            'stats', 'activeOrders', 'recentOrders', 'recentChats', 'notifications'
        ));
    }
}
```

### **4. API Routes untuk AJAX Calls**

```php
// routes/api.php
Route::middleware(['auth:sanctum'])->group(function () {
    // Designs
    Route::get('/designs', [Api\DesignController::class, 'index']);
    Route::get('/designs/{design}', [Api\DesignController::class, 'show']);
    
    // Orders
    Route::get('/orders', [Api\OrderController::class, 'index']);
    Route::post('/orders', [Api\OrderController::class, 'store']);
    Route::get('/orders/{order}', [Api\OrderController::class, 'show']);
    
    // Chat
    Route::get('/chats', [Api\ChatController::class, 'index']);
    Route::post('/chats', [Api\ChatController::class, 'store']);
    Route::patch('/chats/{chat}/read', [Api\ChatController::class, 'markAsRead']);
    
    // Notifications
    Route::get('/notifications', [Api\NotificationController::class, 'index']);
    Route::patch('/notifications/{notification}/read', [Api\NotificationController::class, 'markAsRead']);
    Route::patch('/notifications/mark-all-read', [Api\NotificationController::class, 'markAllAsRead']);
    
    // Payments
    Route::post('/payments', [Api\PaymentController::class, 'store']);
    Route::get('/payments/{payment}', [Api\PaymentController::class, 'show']);
});
```

### **5. Seeders untuk Demo Data**

```php
// database/seeders/DatabaseSeeder.php
public function run()
{
    $this->call([
        UserSeeder::class,
        DesignCategorySeeder::class,
        DesignSeeder::class,
        OrderSeeder::class,
        PaymentSeeder::class,
        ChatSeeder::class,
        NotificationSeeder::class,
    ]);
}

// database/seeders/UserSeeder.php
public function run()
{
    // Admin
    User::create([
        'name' => 'Diana Kusuma',
        'email' => 'admin@daikuinterior.com',
        'phone' => '081234567890',
        'role' => 'admin',
        'password' => Hash::make('password'),
        'email_verified_at' => now(),
    ]);
    
    // Designer
    User::create([
        'name' => 'Andi Pratama',
        'email' => 'designer@daikuinterior.com',
        'phone' => '081234567891',
        'role' => 'designer',
        'password' => Hash::make('password'),
        'email_verified_at' => now(),
    ]);
    
    // Customer
    User::create([
        'name' => 'Sari Wulandari',
        'email' => 'customer@example.com',
        'phone' => '081234567892',
        'role' => 'customer',
        'password' => Hash::make('password'),
        'email_verified_at' => now(),
    ]);
    
    // Create more customers with factory
    User::factory(20)->create(['role' => 'customer']);
}
```

---

## 🔧 **IMPLEMENTASI STEP-BY-STEP**

### **Phase 1: Setup Laravel Project**
1. `composer create-project laravel/laravel daiku-interior`
2. Setup database di `.env`
3. Install additional packages:
   ```bash
   composer require laravel/sanctum
   composer require intervention/image
   composer require spatie/laravel-permission
   ```

### **Phase 2: Database & Models**
1. Create migrations sesuai schema di atas
2. Create models dengan relationships
3. Run migrations dan seeders

### **Phase 3: Authentication & Authorization**
1. Setup Laravel Sanctum untuk API authentication
2. Implement role-based access control
3. Create middleware untuk role checking

### **Phase 4: Frontend Integration**
1. Copy HTML templates ke Blade views
2. Update asset paths
3. Implement AJAX calls ke API endpoints

### **Phase 5: File Upload & Storage**
1. Configure filesystem untuk file uploads
2. Implement image optimization
3. Setup storage linking

### **Phase 6: Testing & Deployment**
1. Write feature tests
2. Setup CI/CD pipeline
3. Deploy to production server

---

## 📊 **TESTING SCENARIOS**

Sesuai dengan dokumen proyek akhir, implementasikan test cases untuk:

1. **Authentication Testing**
2. **Catalog Management Testing**
3. **Order Processing Testing**
4. **Payment Verification Testing**
5. **Chat System Testing**
6. **RFQ Workflow Testing**
7. **Dashboard Functionality Testing**
8. **Notification System Testing**

---

## 🚀 **DEPLOYMENT CHECKLIST**

- [ ] Environment configuration
- [ ] Database optimization
- [ ] File storage setup
- [ ] SSL certificate
- [ ] Backup strategy
- [ ] Monitoring setup
- [ ] Performance optimization
- [ ] Security hardening

---

*Dokumen ini menyediakan foundation yang solid untuk mengkonversi prototype statis ke aplikasi Laravel yang siap produksi sesuai dengan requirement proyek akhir Anda.*