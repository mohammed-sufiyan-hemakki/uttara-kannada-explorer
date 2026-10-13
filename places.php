<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Explore Places - UK Explorer</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a> 
        <a href="places.php">Places</a> 
        <a href="booking.php">Booking</a> 
        <a href="check_status.php">Status</a> 
        <a href="feedback.php">Feedback</a>
    </nav>

    <div class="container">
        <h2 style="text-align:center; color: var(--primary); font-size: 2.2rem; margin-bottom: 10px;">Top Magical Destinations</h2>
        <p style="text-align:center; color: #666; margin-bottom: 40px;">Click on any place card to view rich historic details and additional photos.</p>
        
        <div class="grid-2">
            
            <div class="card" onclick="openGokarnaModal()" style="cursor: pointer; padding: 15px;">
                <img src="images/gokarna.jpg" class="place-card-img">
                <div style="padding: 10px 15px;">
                    <span style="color: var(--secondary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Heritage & Beaches</span>
                    <h3 style="margin: 5px 0 10px 0; color: var(--primary); font-size: 1.4rem;">Gokarna</h3>
                    <p style="margin: 0; color: #555; font-size: 0.9rem;">Sacred home to the legendary Atmalinga, coastal treks, and pristine blue waves.</p>
                </div>
            </div>

            <div class="card" onclick="openModal('images/ecobeach.jpg', 'Eco Beach (Honnavar)', 'Eco Beach at Kasarkod, Honnavar is an officially certified prestigious Blue Flag beach. It is famously known for being incredibly clean, offering eco-friendly wooden park seating, beautiful manicured walking tracks, and mind-calming sunset views.')" style="cursor: pointer; padding: 15px;">
                <img src="images/ecobeach.jpg" class="place-card-img">
                <div style="padding: 10px 15px;">
                    <span style="color: var(--secondary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Blue Flag Certified</span>
                    <h3 style="margin: 5px 0 10px 0; color: var(--primary); font-size: 1.4rem;">Eco Beach</h3>
                    <p style="margin: 0; color: #555; font-size: 0.9rem;">Immaculate crystal-clear waters with manicured gardens located right in Honnavar.</p>
                </div>
            </div>

            <div class="card" onclick="openModal('images/yana.jpeg', 'Yana Rocks', 'Yana is famous for two colossal, pitch-black crystalline karst limestone rock formations known as Bhairaveshwara Shikhara and Mohini Shikhara. Hidden deep within the lush forests of Kumta taluk, it features a fantastic mountain stream trail and cave temple underneath.')" style="cursor: pointer; padding: 15px;">
                <img src="images/yana.jpeg" class="place-card-img">
                <div style="padding: 10px 15px;">
                    <span style="color: var(--secondary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Geological Marvel</span>
                    <h3 style="margin: 5px 0 10px 0; color: var(--primary); font-size: 1.4rem;">Yana Rocks</h3>
                    <p style="margin: 0; color: #555; font-size: 0.9rem;">Gigantic black limestone karsts rising dramatically out of dense tropical rainforest jungles.</p>
                </div>
            </div>

            <div class="card" onclick="openSharavatiModal()" style="cursor: pointer; padding: 15px;">
                <img src="images/sharavati.jpg" class="place-card-img">
                <div style="padding: 10px 15px;">
                    <span style="color: var(--secondary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Nature Backwaters</span>
                    <h3 style="margin: 5px 0 10px 0; color: var(--primary); font-size: 1.4rem;">Sharavati Backwaters</h3>
                    <p style="margin: 0; color: #555; font-size: 0.9rem;">Breathtaking river delta network with sprawling green mangrove boardwalk channels.</p>
                </div>
            </div>

            <div class="card" onclick="openIdgunjiModal()" style="cursor: pointer; padding: 15px;">
                <img src="images/idgunji.jpg" class="place-card-img">
                <div style="padding: 10px 15px;">
                    <span style="color: var(--secondary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Sacred Heritage</span>
                    <h3 style="margin: 5px 0 10px 0; color: var(--primary); font-size: 1.4rem;">Idgunji Temple</h3>
                    <p style="margin: 0; color: #555; font-size: 0.9rem;">Ancient and highly revered Ganapati shrine hosting a unique two-handed standing posture idol.</p>
                </div>
            </div>

            <div class="card" onclick="openModal('images/apsr_sun.jpg', 'Apsarkonda Sunset View', 'Apsarkonda is a stunning hillock overlooking the Arabian Sea near Honnavar. Mythological lore asserts that beautiful angels (Apsaras) chose the natural pond here for bathing. The clifftop park features exceptional sunset viewpoint projections, structural caves, and a crashing fresh hill waterfall landscape.')" style="cursor: pointer; padding: 15px;">
                <img src="images/apsr_sun.jpg" class="place-card-img">
                <div style="padding: 10px 15px;">
                    <span style="color: var(--secondary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Scenic Viewpoint</span>
                    <h3 style="margin: 5px 0 10px 0; color: var(--primary); font-size: 1.4rem;">Apsarkonda</h3>
                    <p style="margin: 0; color: #555; font-size: 0.9rem;">Legendary Angel\'s Pond hillock offering unmatched panoramic views of the ocean sunset.</p>
                </div>
            </div>

            <div class="card" onclick="openModal('images/mirjan.jpg', 'Mirjan Fort', 'Built gracefully over a sprawling area, Mirjan Fort stands out for its high structural bastions, double-moat defenses, and intricate historical wells. Ruled prominently by Queen Chennabhairadevi, the Pepper Queen of India, this majestic fort becomes carpeted in stunning velvet green moss during wet seasons.')" style="cursor: pointer; padding: 15px;">
                <img src="images/mirjan.jpg" class="place-card-img">
                <div style="padding: 10px 15px;">
                    <span style="color: var(--secondary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Historic Fortress</span>
                    <h3 style="margin: 5px 0 10px 0; color: var(--primary); font-size: 1.4rem;">Mirjan Fort</h3>
                    <p style="margin: 0; color: #555; font-size: 0.9rem;">Architectural masterpiece known as the center of the historic coastal pepper trade route.</p>
                </div>
            </div>

            <div class="card" onclick="openMurdeshwarModal()" style="cursor: pointer; padding: 15px;">
                <img src="images/murdeshwar temple.jpg" class="place-card-img">
                <div style="padding: 10px 15px;">
                    <span style="color: var(--secondary); font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Coastal Landmark</span>
                    <h3 style="margin: 5px 0 10px 0; color: var(--primary); font-size: 1.4rem;">Murdeshwar</h3>
                    <p style="margin: 0; color: #555; font-size: 0.9rem;">The world\'s second-tallest Lord Shiva statue surrounded on three sides by the Arabian Sea.</p>
                </div>
            </div>

        </div>
    </div>

    <div id="placeModal" class="modal" onclick="closeModalOnOuterClick(event)">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            
            <div id="imageGalleryContainer">
                <img id="modalImg" src="" style="width:100%; height:320px; object-fit:cover; border-radius:12px; box-shadow: 0 5px 15px rgba(0,0,0,0.15);">
                <div id="thumbBar" style="display:none; gap:10px; margin-top:12px; overflow-x:auto; padding-bottom:5px;"></div>
            </div>

            <h2 id="modalTitle" style="color:var(--primary); margin: 20px 0 10px 0; font-size: 1.7rem;"></h2>
            <div id="modalDesc" style="font-size:0.95rem; line-height:1.7; color:#444; max-height:200px; overflow-y:auto; padding-right:5px;"></div>
            
            <a href="booking.php" class="btn" style="text-decoration:none; display:inline-block; margin-top:20px; text-align:center; width: calc(100% - 64px);">Book Package Tour Now</a>
        </div>
    </div>

    <script>
        // A. OPEN MODAL FOR GOKARNA (With gokarna.jpg, vibhuti.jpg, street.jpg, kodle.jpg)
        function openGokarnaModal() {
            var modal = document.getElementById('placeModal');
            modal.style.display = "flex";
            document.getElementById('modalImg').src = "images/gokarna.jpg";
            
            var thumbBar = document.getElementById('thumbBar');
            thumbBar.style.display = "flex";
            thumbBar.innerHTML = `
                <img src="images/gokarna.jpg" class="thumb active" onclick="changeImg('images/gokarna.jpg', this)">
                <img src="images/vibhuti.jpg" class="thumb" onclick="changeImg('images/vibhuti.jpg', this)">
                <img src="images/street.jpg" class="thumb" onclick="changeImg('images/street.jpg', this)">
                <img src="images/kodle.jpg" class="thumb" onclick="changeImg('images/kodle.jpg', this)">
            `;
            
            document.getElementById('modalTitle').innerText = "Gokarna: The Coastal Bhookailash";
            document.getElementById('modalDesc').innerHTML = `
                <p><strong>Ancient History:</strong> Known as the "Cow\'s Ear" due to its unique geographical positioning between two river mouths, Gokarna is deep-rooted in epic Hindu history. Mythological history relates how the demon king Ravana performed intense penance to secure Shiva\'s sacred <em>Atmalinga</em>. Lord Ganesha cleverly tricked Ravana into putting the Linga down here on the ground, making it permanently unmovable. Ravana tried pulling it out with immense brute force, distorting it into a cow\'s ear shape.</p>
                <p><strong>Top Places to Tour:</strong> Mahabaleshwar Temple, the beautiful naturally \'Om\' shaped coastal beach, Kudle Beach surf bays, half-moon beach viewpoints, energetic temple street bazaar lanes, and the refreshing emerald waters of Vibhuti waterfalls hidden nearby.</p>
            `;
        }

        // B. OPEN MODAL FOR SHARAVATI BACKWATERS (With sharavati.jpg, hnr.webp)
        function openSharavatiModal() {
            var modal = document.getElementById('placeModal');
            modal.style.display = "flex";
            document.getElementById('modalImg').src = "images/sharavati.jpg";
            
            var thumbBar = document.getElementById('thumbBar');
            thumbBar.style.display = "flex";
            thumbBar.innerHTML = `
                <img src="images/sharavati.jpg" class="thumb active" onclick="changeImg('images/sharavati.jpg', this)">
                <img src="images/hnr.webp" class="thumb" onclick="changeImg('images/hnr.webp', this)">
            `;
            
            document.getElementById('modalTitle').innerText = "Sharavati River Backwaters";
            document.getElementById('modalDesc').innerHTML = `
                <p><strong>Natural Landscapes:</strong> Where the expansive Sharavati River smoothly exits the Western Ghats and merges into the Arabian Sea at Honnavar, it produces a mystical cluster of rich estuarine mangrove islands. The pristine delta contains dense networks of protective evergreen mangrove roots forming mysterious green water tunnels.</p>
                <p><strong>Tour Highlights:</strong> Island country boating safaris, scenic traditional wooden boat rowing tours, bird watching, and stunning island community village trails.</p>
            `;
        }

        // C. OPEN MODAL FOR IDGUNJI (With idgunji.jpg, temple.jpg)
        function openIdgunjiModal() {
            var modal = document.getElementById('placeModal');
            modal.style.display = "flex";
            document.getElementById('modalImg').src = "images/idgunji.jpg";
            
            var thumbBar = document.getElementById('thumbBar');
            thumbBar.style.display = "flex";
            thumbBar.innerHTML = `
                <img src="images/idgunji.jpg" class="thumb active" onclick="changeImg('images/idgunji.jpg', this)">
                <img src="images/temple.jpg" class="thumb" onclick="changeImg('images/temple.jpg', this)">
            `;
            
            document.getElementById('modalTitle').innerText = "Mavinakatte Idgunji Ganapati Temple";
            document.getElementById('modalDesc').innerHTML = `
                <p><strong>Sacred Heritage:</strong> Dating back over 1500 years, Idgunji is one of the most prominent Ganesha temples in India. According to scripts, Maharishi Narada executed sacred rituals here to calm down planetary balances. The unique idol of Lord Vinayaka is standing up with only two hands, holding a lotus bud and a modak sweet cake reward.</p>
                <p><strong>Visitor Experience:</strong> Thousands of spiritual explorers visit daily to receive divine blessings and participate in traditional noon-time temple feasts.</p>
            `;
        }

        // D. OPEN MODAL FOR MURDESHWAR (With murdeshwar temple.jpg, murdeshwar.jpg)
        function openMurdeshwarModal() {
            var modal = document.getElementById('placeModal');
            modal.style.display = "flex";
            document.getElementById('modalImg').src = "images/murdeshwar temple.jpg";
            
            var thumbBar = document.getElementById('thumbBar');
            thumbBar.style.display = "flex";
            thumbBar.innerHTML = `
                <img src="images/murdeshwar temple.jpg" class="thumb active" onclick="changeImg('images/murdeshwar temple.jpg', this)">
                <img src="images/murdeshwar.jpg" class="thumb" onclick="changeImg('images/murdeshwar.jpg', this)">
            `;
            
            document.getElementById('modalTitle').innerText = "Murdeshwar Temple & Kanduka Giri Complex";
            document.getElementById('modalDesc').innerHTML = `
                <p><strong>Grand Architecture:</strong> Murdeshwar holds profound spiritual importance as the spot where Ravana threw the cloth covering of the sacred Atmalinga. It features a massive 20-story high Raja Gopuram entrance tower equipped with a modern elevator ride taking travelers to the top window frame for beautiful ocean views.</p>
                <p><strong>Key Highlights:</strong> The spectacular 123-feet tall towering sitting Shiva monument, direct beach access walking pathways, speed boat ocean rides, and panoramic view decks of the deep blue sea waves.</p>
            `;
        }

        // STATIC MODAL FUNCTION FOR STANDARD SINGLE PHOTO CARDS (Eco Beach, Yana, Mirjan, Apsarkonda)
        function openModal(src, title, desc) {
            var modal = document.getElementById('placeModal');
            modal.style.display = "flex";
            document.getElementById('modalImg').src = src;
            document.getElementById('thumbBar').style.display = "none"; 
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalDesc').innerHTML = "<p>" + desc + "</p>";
        }

        // GALLERY CONTROLLER SWITCH INTERFACE
        function changeImg(src, thumbElement) {
            document.getElementById('modalImg').src = src;
            var thumbs = thumbElement.parentElement.querySelectorAll('.thumb');
            thumbs.forEach(t => t.classList.remove('active'));
            thumbElement.classList.add('active');
        }

        function closeModal() { 
            document.getElementById('placeModal').style.display = "none"; 
        }

        function closeModalOnOuterClick(e) {
            if(e.target.className === 'modal') { closeModal(); }
        }
    </script>
</body>
</html>