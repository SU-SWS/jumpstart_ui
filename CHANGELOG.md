# Jumpstart UI

8.x-1.11
--------------------------------------------------------------------------------
_Release Date: 2020-09-09_

- D8CORE-2376: Overrides local footer lockup (#73) (57f4543)
- D8CORE-2490 D8CORE-1609: Global Elements (#72) (9abc078)
- D8CORE-2534: URL encode link in card component. (#71) (64ddbe9)
- D8CORE-2499 Updated composer license (#70) (a2f7a09)
- CSD-000 Added jumpstart-ui column class (#69) (e2b63fd)

8.x-1.10
--------------------------------------------------------------------------------
_Release Date: 2020-08-13_

- Corrected template markup that was stripping links in card pattern headline.

8.x-1.9
--------------------------------------------------------------------------------
_Release Date: 2020-08-07_

- D8CORE-1726: making sure the h2 does not show as empty tags (#66) (9a9ea46)
- D8CORE-2047: the organization in the address is not a heading. Reduce the font so it doesn't look like one. (#64) (7ee02e4)
- Bump lodash from 4.17.15 to 4.17.19 (#63) (0d0c556)

8.x-1.8
--------------------------------------------------------------------------------
_Release Date: 2020-07-13_

- D8CORE-1538: Convert behat tests to codeception (#61) (218a01d)
- D8CORE-1866 Convert special characters for the banner link pattern (#60) (b242ba6)

8.x-1.7
--------------------------------------------------------------------------------
_Release Date: 2020-06-17_

- Add settings.extra_classes to one column with an overlay layout (#57) (87a4c72)

8.x-1.6
--------------------------------------------------------------------------------
_Release Date: 2020-05-15_

- Add custom page title block. (#55) (acc395e)
- Added a one column with an overlay layout (#54) (ee6e0ba)
- Add max columns for one column layout. (#53) (986302f)

8.x-1.5
--------------------------------------------------------------------------------
_Release Date: 2020-04-16_

- Updated layouts & Kernel Tests For All The Layouts (#44)
- DCORE-1504: Ensure unique id's in the media template. (#46)
- CSD-19 Added configurable orientation to the two column layout. (#48)
- D8CORE-1644: Dev branch workflow. Created master branch, changed the release workflow, added automated tagging
- Fixed prepocess hook logic to prevent unwanted alters (#50)
- D8CORE-1847 Decode html entities (#51)

8.x-1.4
--------------------------------------------------------------------------------
_Release Date: 2020-02-27_

- D8CORE-1427: Remove render array junk when checking for empty on hero_link variable in hero.html.twig template. (#35)
- D8CORE-1457: Allow special chars in urls. (#38)
- D8CORE-1327: fixing the footer for special characters (#39)
- Update to Decanter 6.0.4 (#36)
- Change to three column class selector. (#40)
- Decanter Version 6.0.5 (#41)
- D8CORE-1291: IE fixes (#43)

8.x-1.3
--------------------------------------------------------------------------------
_Release Date: 2020-02-21_

- D8CORE-1398: Fix broken link mapping for hero buttons

8.x-1.2
--------------------------------------------------------------------------------
_Release Date: 2020-02-19_

- D8CORE-106: Media with caption paragraph (#20)

8.x-1.1
--------------------------------------------------------------------------------
_Release Date: 2020-02-14_

- Don't add the login link to the local footer pattern for logged in users.
- D8CORE-1233: Cannot assume attributes is being passed in. (#26)
- Bugfix: jumpstart-ui--three-column to jumpstart-ui--two-column (#27)

8.x-1.0
--------------------------------------------------------------------------------
_Release Date: 2020-02-05_

- Updated to use Decanter version 6.0.1
- D8CORE-714: Ensure no duplicate attributes on components
- D8CORE-931: Skip Links
- D8CORE-1250: Changed aside and section tags to divs since cannot predict content and using semantics wrong


8.x-1.0-alpha4
--------------------------------------------------------------------------------
_Release Date: 2020-01-22_

- D8CORE-972: Ensure object-fit model for media component video
- D8CORE-1010: Update to Decanter version 6.0.1
- D8CORE-1010: Removed Decanter layout templates
- D8CORE-1010: Updates to webpack build.
- D8CORE-1010: Updates to postcss.config.js file
- Overrode the block_card_media twig block in card.html.twig
- Updates to card pattern fields (regions). New items only.
- New Decanter component: date-stacked
- New Decanter component: media
- Layout templates three/two-column.html.twig now collapse sidebar at lg breakpoint to match when the mobile nav is available.

8.x-1.0-alpha3
--------------------------------------------------------------------------------
_Release Date: 2019-12-05_

- D8CORE-726 Wired up local footer template from Decanter as a pattern.
- D8CORE-859 Card video styles for media/video

8.x-1.0-alpha2
--------------------------------------------------------------------------------
- D8CORE-387 Dynamic layouts: Removed all Decanter Grid layouts in favor of a few
configurable layouts.
- Requires Drupal ^8.8
- Caravan running with latest-drupal now

8.x-1.0-alpha1
--------------------------------------------------------------------------------
_Release Date: 2019-10-30_

- Initial Release.
