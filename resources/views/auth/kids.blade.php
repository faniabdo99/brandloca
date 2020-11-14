@include('layout.header' , ['pageTitle' => 'ابلاغ عن مشكلة'])

<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
    <section class="profile-section">
        <div class="container">
            <div class="row">
                @include('auth.profile-sidebar')
                <div class="col-lg-8">
                    <h4 class="mb-4 text-right">أطفالي</h4>
                    <p class="text-right">قم باضافة أطفالك لفرصة الحصول على منتج مجاني أو كوبون خصم في يوم ميلادهم!</p>
                    @if(auth()->user()->Kids->count())
                        <table class="table table-striped text-right mb-5">
                            <thead>
                                <th>الاسم</th>
                                <th>تاريخ الميلاد</th>
                                <th>العمر</th>
                                <th>الجنس</th>
                                <th>اجرائات</th>
                            </thead>
                            <tbody>
                                @foreach (auth()->user()->Kids as $Kid)
                                <tr>
                                    <td>{{$Kid->name}}</td>
                                    <td>{{$Kid->dob}}</td>
                                    <td>{{$Kid->Age}} سنة</td>
                                    <td>{{$Kid->GenderText}}</td>
                                    <td><a class="text-danger" href="javascript:;" data-toggle="modal" data-target="#delete-kid-modal-{{$Kid->id}}">حذف <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="delete-kid-modal-{{$Kid->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-kid-modal-{{$Kid->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" dir="rtl">
                                                  <h5 class="modal-title">هل أنت متأكد ؟</h5>
                                                </div>
                                                <div class="modal-body text-center">
                                                    سيتم حذف بيانات الطفل نهائياً , هل انت متأكد؟<br><br>
                                                    <a href="{{route('profile.kid.delete' , $Kid->id)}}" class="btn btn-danger">حذف الطفل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>لم تقم باضافة أي طفل الى حسابك</p>
                        @endif
                        <h4 class="mb-4 text-right">اضافة بيانات طفل</h4>
                        <div class="arte-form mb-5">
                            <form method="post" action="{{route('profile.kids.add')}}">
                                @csrf
                                <label for="name">اسم الطفل *</label>
                                <input type="text" name="name" id="name" placeholder="اسم الطفل" value="{{old('name') ?? ''}}" required>
                                <label for="gender">الجنس *</label>
                                <select id="gender" name="gender" required>
                                    <option @if(!old('gender')) selected
                                    @endif value="">اختر جنس الطفل</option>
                                    <option @if(old('gender') == 'male') selected
                                    @endif value="male">ذكر</option>
                                    <option @if(old('gender') == 'female') selected
                                    @endif value="female">أنثى</option>
                                </select>
                                <label for="dob">تاريخ الميلاد*</label>
                                <input type="date" name="dob" id="dob" value="{{old('dob') ?? ''}}" required>
                                <button class="site-btn" type="submit">اضافة</button>
                            </form>
                        </div>
                </div>
            </div>
    </section>
    <!-- Hero section end -->
    @include('layout.footer')
    @include('layout.scripts')
    <script src="{{url('public/js/')}}/auth.js"></script>
</body>

</html>
