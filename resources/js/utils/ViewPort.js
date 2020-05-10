export class ViewPort {

    /**
     * Instatiate the class
     */
    constructor()
    {
        this.device_width = window.outerWidth;

        window.addEventListener('resize', function(){
            let width = window.outerWidth;
            this.device_width = width;
        });
    }

    /**
     * Check if the viewport is mobile
     */
    isMobile()
    {
        return this.device_width < 768;
    }

    /**
     * Check if the viewport is tablet
     */
    isTablet()
    {
        return this.device_width >= 768;
    }

    /**
     * Checks if the viewport is desktop
     */
    isDesktop()
    {
        return this.device_width >= 1280;
    }

    /**
     * Check if the view port is a tablet and not a desktop
     */
    isTabletOnly()
    {
        return this.isTablet() && !this.isDesktop();
    }
}
