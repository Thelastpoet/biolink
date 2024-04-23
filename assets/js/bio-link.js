document.addEventListener('DOMContentLoaded', function() {
    function initElementorCustomizations() {
        // Work on the container holding navbar widget 
        elementor.hooks.addAction('panel/open_editor/container', function(panel, model, view) {            
            // Set the content width to full 
           //model.setSetting('content_width', 'full'); 
            
            
        }); 
        
    } 
    
    // Check if Elementor is loaded and initialize customizations 
    if (window.elementor && window.elementor.hooks) {
        initElementorCustomizations(); 
    } else {
        window.addEventListener('elementor:init', initElementorCustomizations); 
    } 
});