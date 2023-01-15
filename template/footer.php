        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; E-Padyak 2022</div>
                    <div class="col-lg-4 text-lg-center">Email: 
                    <?php 
                    $qe = $conn->query("select * from tbl_content where title = 'Email'");
                    $re = $qe->fetch_assoc();
                    ?>
                    <a href="mailto:<?php echo $re['content']; ?>"><?php echo $re['content']; ?></a> <br /> Contact: 
                    <?php 
                    $qc = $conn->query("select * from tbl_content where title = 'Contact'");
                    $rc = $qc->fetch_assoc();
                    echo $rc['content'];
                    ?></div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="privacy-policy.php">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="terms-of-use.php">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
       <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>