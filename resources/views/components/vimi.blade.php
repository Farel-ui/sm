<section class="visi-misi">
    <div class="left-image">
      <img src="images/walkotl.svg" alt="Walikota dan Wakil Walikota">
    </div>
    <div class="right-text">
      <h2>VISI</h2>
      <p>Terwujudnya Kota Bogor sebagai<br>
         Ramah Keluarga.</p>
      <h2>MISI</h2>
      <ul>
        <li>Mewujudkan Kota yang Sehat</li>
        <li>Mewujudkan Kota yang Cerdas</li>
        <li>Mewujudkan Kota yang Sejahtera</li>
      </ul>
    </div>
    <style>
        /* visi misi style */

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #ffffff;
  color: #1E1E1E;
  height: 100vh;
}

.visi-misi {
  display: flex;
 
  background-color: #D6E4F0;
  overflow: hidden;
}

.left-image {
  flex: 1;
  display: flex;
  align-items: stretch;
  justify-content: center;
  overflow: hidden;
}

.left-image img {
  height: 100%;
  width: auto;
  object-fit: cover;
  display: block;
}

.right-text {
  flex: 1;
  padding: 60px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-left: 50px;
  color: #3B3B3B;
}

.right-text h2 {
  font-size: 64px;
  font-weight: bold;
  margin-bottom: 10px;
}

.right-text p {
  font-size: 25px;
  margin-bottom: 20px;
  font-weight: 600;
}

.right-text ul {
  list-style: none;
  font-size: 25px;
  font-weight: 600;
  line-height: 1.8;
}

.right-text ul li::before {
  content: "- ";
}
    </style>
  </section>