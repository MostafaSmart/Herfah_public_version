    <!-- Start Discount -->
    <div class="discount" id="discount">
        <div class="image">
            <div class="content">
                <h2>عن المنصة</h2>
                <p>
                    منصة حرفة هي عبارة عن منصة تم إنشاءها من قبل مجموعة من الشباب في كلية العلوم قسم تقنية معلومات جامعة
                    إب بهف توفير وسيلة سهله للعمال المهنيين لإيجاد عمل وإيضا تسهل على المواطن إيجاد عامل له بسهولة وسرعة
                    ويسر
                </p>
                <img src="assets/imgs/about3 (1).png" alt="" />
            </div>
        </div>
        <div class="form">
            <div class="content">
                <h2>نسعد باستقبال الرسائل</h2>
                <form action="{{ route('message.store') }}" method="POST">
                    @csrf
                    <input class="input" type="text" placeholder="أسمك" name="name" />
                    <input class="input" type="text" placeholder="عنوان الرسالة" name="title" />
                    <textarea class="input" placeholder="محتوى الرسالة" name="message"></textarea>
                    <input type="submit" value="إرسال" />
                </form>
            </div>

        </div>
    </div>
    </div>
    <!-- End Discount -->
