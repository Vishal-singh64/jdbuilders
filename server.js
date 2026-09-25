import express from 'express';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
const PORT = process.env.PORT || 3000;

// Setup EJS view engine
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// Body parsing middleware
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Serve static assets
app.use('/css', express.static(path.join(__dirname, 'css')));
app.use('/asset', express.static(path.join(__dirname, 'asset')));
app.use('/public', express.static(path.join(__dirname, 'public')));
app.use(express.static(path.join(__dirname, 'public')));

// In-memory submissions store
const contactSubmissions = [];

// Page Routes
app.get(['/', '/index.php'], (req, res) => {
    res.render('index', { currentPage: 'index', title: 'Building Dreams, One Brick at a Time' });
});

app.get(['/about', '/about.php'], (req, res) => {
    res.render('about', { currentPage: 'about', title: 'About Us' });
});

app.get(['/services', '/services.php', '/servies.php'], (req, res) => {
    res.render('services', { currentPage: 'services', title: 'Services' });
});

app.get(['/gallary', '/gallary.php', '/gallery', '/gallery.php'], (req, res) => {
    res.render('gallary', { currentPage: 'gallary', title: 'Gallery' });
});

app.get(['/plans', '/plans.php'], (req, res) => {
    res.render('plans', { currentPage: 'plans', title: 'Construction Plans & Pricing' });
});

app.get(['/contact', '/contact.php'], (req, res) => {
    res.render('contact', { currentPage: 'contact', title: 'Contact Us' });
});

app.get(['/thank_you.html', '/thankYou.html'], (req, res) => {
    res.render('thank_you', { currentPage: 'contact', title: 'Thank You' });
});

// Contact Form Handlers
app.post(['/send_mail.php', '/contact_process.php', '/service/sendMail.php', '/api/contact'], (req, res) => {
    const { name, email, phone, message } = req.body || {};
    const entry = {
        name: name || 'Anonymous',
        email: email || '',
        phone: phone || '',
        message: message || '',
        submittedAt: new Date().toISOString()
    };
    contactSubmissions.push(entry);
    console.log('[Contact Form Received]:', entry);

    const isAjax = req.xhr ||
        (req.headers.accept && req.headers.accept.includes('application/json')) ||
        (req.headers['content-type'] && req.headers['content-type'].includes('application/json'));

    if (isAjax) {
        return res.json({ success: true, message: 'Mail sent successfully!' });
    }
    return res.redirect('/thank_you.html');
});

// 404 Fallback
app.use((req, res) => {
    res.status(404).render('index', { currentPage: 'index', title: 'JD Builders' });
});

// Start Server on 0.0.0.0:3000
app.listen(PORT, '0.0.0.0', () => {
    console.log(`JD Builders app running on http://0.0.0.0:${PORT}`);
});
