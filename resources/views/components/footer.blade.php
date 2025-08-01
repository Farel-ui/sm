{{-- footer --}}
  <div class="footer-section" id="footer">

    <!-- Judul & Logo -->
    <div class="footer-header">

    </div>

    <!-- Info Alamat, Email, Telepon -->
    <div class="footer-info">
      <!-- ALAMAT -->
      <div class="info-block">
        <div class="info-title">
          <img src="images/logoalamat.svg" alt="Alamat Icon" class="info-icon">
          <h3>Alamat</h3>
        </div>
        <div class="teksteks">
        <p>Jl. Ir. H. Juanda No.10, RT.01/RW.01, Paledang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16121, Indonesia</p>
        </div>
      </div>

      <!-- EMAIL -->
      <div class="info-block">
        <div class="info-title">
          <img src="images/logoemail.svg" alt="Email Icon" class="info-icon">
          <h3>E-mail</h3>
        </div>
        <div class="teksteks">
        <p>bag.humas@kotabogor.go.id</p>
        <p>kominfo@kotabogor.go.id</p>
        <p>sibadra.kotabogor.go.id</p>
        </div>
      </div>

      <!-- KONTAK -->
      <div class="info-block">
        <div class="info-title">
          <img src="images/logotelp.svg" alt="Phone Icon" class="info-icon">
          <h3>Kontak</h3>
        </div>
        <div class="teksteks">
        <p>+62251 - 8321075</p>
        </div>
      </div>
    </div>

    <!-- Sosial Media -->
    <div class="footer-sosmed">
      <ul class="sosmed-list">
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-google"></i></a></li>
      </ul>
    </div>

    <!-- Copyright -->
    <div class="bottom-bar">
      <p>Hak Cipta &copy; 2021 Dinas Komunikasi dan Informatika Kota Bogor.</p>
    </div>

  </div>
  <style>
  .footer-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #D6E4F0;
  border-radius: 50px 50px 0 0 ;
  margin-top: 30px;
}

.footer-header {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
  margin-bottom: 50px;
  margin-top: 20px;
}

.footer-logo {
  width: 100px;
  height: auto;
  background: linear-gradient(to right, #1E60D5 30%, transparent 100%);
  padding: 6px ;
  object-fit: contain;
  margin-top: 30px;
  
}

.footer-title-box {
  background: linear-gradient(to left, #1E60D5 60%, transparent 100%);
  padding: 5px 30px;
  font-size: 32px;
  font-weight: 500;
  color: #fff;
  margin-top: 30px;

}


.footer-info {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 150px;
  margin-bottom: 30px;
  text-align: left;
  margin-top: 10px;
}

.info-block {
  max-width: 300px;
  text-align: left;
}

.info-title {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 6px;
}

.info-title h3 {
  margin: 0;
  font-size: 36px;
  font-weight: 600;
  color: #3B3B3B;
}

.info-icon {
  width: 50px;
  height: 50px;
  object-fit: contain;
  transition: transform 0.3s ease;
   filter: brightness(1) drop-shadow(0 0 0 transparent);
}

.info-icon:hover {
  transform: scale(1.1);
   filter: brightness(1.5) drop-shadow(0 0 8px #1e60d5);
}


.footer-sosmed {
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
}

.sosmed-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  gap: 20px;
}

.sosmed-list li a {
  font-size: 38px;
  color: #333;
  transition: color 0.3s ease;
}

.sosmed-list li a:hover {
  color: #2169d4;
}


.bottom-bar {
  text-align: center;
  font-size: 20px;
  color: #777;
  margin-bottom: 30px;
}

.teksteks {
  font-size: 20px;
  height: 400;
}
</style>
</section>